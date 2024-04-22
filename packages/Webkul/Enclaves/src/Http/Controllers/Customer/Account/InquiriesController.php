<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

use Illuminate\Http\JsonResponse;
use Webkul\Enclaves\Repositories\TicketsRepository;
use Webkul\Enclaves\Repositories\TicketReasonsRepository;

class InquiriesController extends AbstractController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected TicketsRepository $ticketsRepository,
        protected TicketReasonsRepository $ticketReasonsRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reasons = $this->ticketReasonsRepository->get();

        return view('shop::customers.account.inquire.index', compact('reasons'));
    }

    /**
     * Display all tickets in view
     *
     * @return \Illuminate\View\View | JsonResponse
     */
    public function tickets()
    {
        $limit = request('limit') ?? 4;

        $tickets = $this->ticketsRepository;

        $count = $tickets->count();

        $tickets = $tickets->with(['files', 'reasons', 'status'])->orderBy('id', 'desc')->limit($limit);
    
        if (request()->ajax()) {
            return new JsonResponse([
                'tickets' => $tickets,
                'count'   => $count,
            ]);
        }

        return view('shop::customers.account.inquire.tickets', compact('tickets', 'count'));
    }

    /**
     * Store Ticket
     */
    public function store(): JsonResponse
    {
        $request = request()->only([
            'reason',
            'comment',
            'file',
        ]);

        $data = [
            'customer_id'      => self::customerId(),
            'ticket_reason_id' => 1,
            'ticket_status_id' => 1,
            'comment'          => $request['comment'],
        ];

        $ticket = $this->ticketsRepository->create($data);

        $this->ticketsRepository->uploadImages($ticket);

        session()->flash('success', trans('enclaves::app.shop.customers.inquiries.list.create-success'));

        return new JsonResponse([
            'redirect' => route('enclaves.customers.account.inquiries.index'),
        ]);
    }
}
