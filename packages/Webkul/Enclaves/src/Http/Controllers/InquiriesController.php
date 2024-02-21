<?php

namespace Webkul\Enclaves\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Enclaves\Repositories\TicketsRepository;
use Webkul\Enclaves\Repositories\TicketReasonsRepository;

class InquiriesController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function tickets()
    {
        $tickets = $this->ticketsRepository
                        ->with(['files', 'reasons', 'status'])
                        ->get();

        return view('shop::customers.account.inquire.tickets', compact('tickets'));
    }

    /**
     * Store Ticket
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(): JsonResponse
    {
        $request = request()->only([
            'reason',
            'comment',
            'file',
        ]);

        $data = [
            'customer_id'      => auth()->guard('admin')->user()->id,
            'ticket_reason_id' => 1,
            'status'           => 1,
            'comment'          => $request['comment'],
        ];

        $ticket = $this->ticketsRepository->create($data);

        $this->ticketsRepository->uploadImages($ticket);
        
        session()->flash('success', trans('enclaves::app.customers.inquiries.list.create-success'));

        return new JsonResponse([
            'redirect' => route('enclaves.customers.account.inquiries.index'),
        ]);
    }
}