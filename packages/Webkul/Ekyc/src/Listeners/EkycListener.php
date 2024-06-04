<?php

namespace Webkul\Ekyc\Listeners;

use Webkul\Ekyc\Helpers\EkycVerificationCreateOrUpdate;

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
        app(EkycVerificationCreateOrUpdate::class)->create($payload);
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
