<?php

namespace Webkul\Enclaves\Http\Controllers\Admin;

use Webkul\Enclaves\DataGrids\FaqDataGrid;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Enclaves\Repositories\FaqRepository;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected FaqRepository $faqRepository
    ) {
    }

    /**
     * Edit the theme
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(FaqDataGrid::class)->toJson();
        }

        return view('enclaves::admin.inquiries.faq.index');
    }

    /**
     * Store Inquiries
     */
    public function store() 
    {
        $this->validate(request(), [
            'question'    => 'required',
            'answer'      => 'required',
        ]);

        $data = request()->only([
            'question',
            'answer',
            'status',
        ]);

        $this->faqRepository->create($data);

        session()->flash('success', trans('enclaves::app.admin.inquiries.faq.form.create.create-success'));

        return redirect()->back();
    }

    /**
     * Update Inquiries
     */
    public function update() 
    {
        try {
            $this->validate(request(), [
                'id'          => 'required',
                'question'    => 'required',
                'answer'      => 'required',
            ]);
    
            $data = request()->only([
                'id',
                'question',
                'answer',
                'status',
            ]);
            
            if(isset($data['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            $this->faqRepository->update($data, $data['id']);
    
            return response()->json([
                'message' => trans('enclaves::app.admin.inquiries.faq.form.create.update-success'),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->faqRepository->delete($id);

            session()->flash('success', trans('enclaves::app.admin.inquiries.faq.form.create.delete-success'));

            return redirect()->back();
        } catch (\Throwable $th) {
        }

        return response()->json([
            'message' => trans('enclaves::app.admin.inquiries.faq.form.create.delete-failed'),
        ], 500);
    }
}
