<?php

namespace Webkul\Ekyc\Listeners;

use Webkul\Ekyc\Helpers\EkycVerificationHelper;

class EkycListener
{
    /**
     * store ekyc details.
     *
     * @param  array  $payload
     * @return void
     */
    public function afterCreate($payload)
    {
        app(EkycVerificationHelper::class)->store($payload);
    }

    /**
     * after update cms page.
     *
     * @param  mixed  $page
     * @return void
     */
    public function afterPageUpdateCreate($page)
    {
        $locals = core()->getAllLocales();

        foreach ($locals as $key => $local) {
            $page->translations[$key]->btn_title = request()->input('btn_title');
        }

        $page->save();
    }
}
