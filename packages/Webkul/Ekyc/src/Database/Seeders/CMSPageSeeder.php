<?php

namespace Webkul\Ekyc\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Cmd: php artisan db:seed --class="Webkul\\Ekyc\\Database\\Seeders\\CMSPageSeeder"

class CMSPageSeeder extends Seeder
{
    public function run()
    {
        DB::table('cms_pages')->updateOrInsert(['layout' => 'verify-page'], 
            [
                'layout'     => 'verify-page',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        $cmsPage = DB::table('cms_pages')->where(['layout' => 'verify-page'])->first();

        DB::table('cms_page_channels')->updateOrInsert([
            'cms_page_id' => $cmsPage->id,
        ],[
            'cms_page_id' => $cmsPage->id,
            'channel_id'  => core()->getCurrentChannel()->id,
        ]);

        $locals = core()->getAllLocales();

        foreach ($locals as $key => $local) {
            DB::table('cms_page_translations')->updateOrInsert([
                'cms_page_id' => $cmsPage->id
            ], [
                'page_title'   => 'Verify Page',
                'url_key'      => 'verify-page',
                'btn_title'    => 'Proceed to Booking',
                'html_content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Leeriest sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Lauds PageMaker including versions of Lorem Ipsum.</p>",
                'locale'       => $local->code,
            ]);
        }
        
    }
}
