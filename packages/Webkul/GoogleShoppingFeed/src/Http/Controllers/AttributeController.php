<?php

namespace Webkul\GoogleShoppingFeed\Http\Controllers;

use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\GoogleShoppingFeed\Repositories\MapGoogleProductAttributeRepository;
use Webkul\GoogleShoppingFeed\Http\Request\MapAttribute;

class AttributeController extends Controller
{
    /**
     * Create new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected MapGoogleProductAttributeRepository $mapGoogleProductAttributeRepository,
        protected AttributeRepository $attributeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $googleProductAttribute = $this->mapGoogleProductAttributeRepository->first();

        $attributes = $this->attributeRepository->all();

        return view('google_feed::admin.attribute.index')->with([
            'googleProductAttribute' => $googleProductAttribute,
            'attributes'             => $attributes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapAttribute $request)
    {   
        if (request()->input('id')) {
            $googleProductAttribute = $this->mapGoogleProductAttributeRepository->findOneByField('id', request()->input('id'));

            $googleProductAttribute->update($request->all());

            session()->flash('success', trans('google_feed::app.admin.attribute.update-success'));
        } else {
            $this->mapGoogleProductAttributeRepository->create($request->all());

            session()->flash('success', trans('google_feed::app.admin.attribute.save-success'));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $googleProductAttribute = $this->mapGoogleProductAttributeRepository->find($id);

        if (! $googleProductAttribute) {
            session()->flash('success', trans('google_feed::app.admin.attribute.delete-failed'));

            return redirect()->back();
        }

        $googleProductAttribute->delete();

        session()->flash('success', trans('google_feed::app.admin.attribute.delete-success'));

        return redirect()->back();
    }
}