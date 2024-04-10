<?php

namespace Webkul\Enclaves\Http\Controllers\Admin;

use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(public ThemeCustomizationRepository $themeCustomizationRepository)
    {
    }

    /**
     * Edit the theme
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $theme = $this->themeCustomizationRepository->find($id);

        return view('enclaves::admin.settings.themes.edit', compact('theme'));
    }
}
