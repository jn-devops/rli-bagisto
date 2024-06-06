<?php

namespace Webkul\Blog\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
use Webkul\User\Repositories\AdminRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogRepository $blogRepository,
        protected AdminRepository $adminRepository,
        protected CoreConfigRepository $coreConfigRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToLogin()
    {
        return redirect()->route('admin.session.create');
    }

    /**
     * Get the value of a configuration setting by its code.
     *
     * This function retrieves the value of a configuration setting from the
     * database using its unique code. If the configuration setting is not found,
     * the function returns null.
     *
     * @param string
     * @return mixed
     */
    public function getConfigByKey($code = '')
    {
        $config_val = null;
        
        if (! empty($code)) {
            $config = $this->coreConfigRepository->where('code', $code)->first();

            if ($config) {
                $config_val = $config->value;
            }
        }

        return $config_val;
    }
}