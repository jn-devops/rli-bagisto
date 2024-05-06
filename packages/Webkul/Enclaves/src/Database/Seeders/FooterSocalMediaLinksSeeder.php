<?php

namespace Webkul\Enclaves\Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;

// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\\Seeders\\FooterSocalMediaLinksSeeder"
class FooterSocalMediaLinksSeeder extends Seeder
{
    public function run()
    {
        // For Static social Media Link.
        $socialMediaLinks = [
            [
                "url"        => "http://192.168.15.214/rli-bagisto/public/facebook",
                "title"      => "Facebook",
                "sort_order" => "1",
            ], [
                "url"        => "http://192.168.15.214/rli-bagisto/public/instagram",
                "title"      => "Instagram",
                "sort_order" => "2",
            ], [
                "url"        => "http://192.168.15.214/rli-bagisto/public/youtube",
                "title"      => "Youtube",
                "sort_order" => "3",
            ], [
                "url"        => "http://192.168.15.214/rli-bagisto/public/tiktok",
                "title"      => "Tiktok",
                "sort_order" => "4",
            ],
        ];

        $footerLinks = app(ThemeCustomizationRepository::class)->where('type', 'footer_links')->first();

        if(! empty($footerLinks->translations->first())) {
            $savedLinks = $footerLinks->translations->first()->options;

            $savedLinks['column_3'] = $socialMediaLinks;

            $footerLinks->translations->first()->update(['options' => $savedLinks]);
        }
    }
}
