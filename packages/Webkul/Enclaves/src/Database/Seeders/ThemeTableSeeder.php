<?php

namespace Webkul\Enclaves\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


// Path: php artisan db:seed --class="Webkul\\Enclaves\\Database\Seeders\\ThemeTableSeeder"

class ThemeTableSeeder extends Seeder
{
    /**
     * Base path for the images.
     */
    const BASE_PATH = 'packages/Webkul/Enclaves/src/Resources/assets/images/seeders/theme/';

    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run()
    {
        $defaultLocale = core()->getCurrentLocale()->code ?? config('app.locale');
        $now = Carbon::now();

        $sections = [
            [
                'type'       => 'static_content',
                'name'       => trans('enclaves::app.admin.seeders.theme.about-homeful.title'),
                'sort_order' => 2,
                'status'     => 1,
                'channel_id' => 1,
                "html" => view('enclaves::admin.seeders.theme.about-homeful', [
                    'img_1' => $this->storeFileIfExists('enclave/theme', 'img_1.png', 'img_1.png'),
                ])->render(),
                "css" => '',
            ],
        ];

        foreach ($sections as $section) {
            $sectionExits = DB::table('theme_customizations')
                ->where('name', trans('enclaves::app.admin.seeders.theme.about-homeful.title'))
                ->where('type', $section['type'])
                ->first();

            if ($sectionExits) {
                DB::table('theme_customizations')->where('id', $sectionExits->id)->delete();
            }

            $insertedPageId = DB::table('theme_customizations')->insertGetId(
                [
                    'type'       => $section['type'],
                    'name'       => $section['name'],
                    'sort_order' => $section['sort_order'],
                    'status'     => $section['status'],
                    'channel_id' => $section['channel_id'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            );

            $locales = core()->getAllLocales()->pluck('code') ?? [$defaultLocale];

            foreach ($locales as $locale) {
                DB::table('theme_customization_translations')->insert(
                    [
                        'theme_customization_id' => $insertedPageId,
                        'locale'                 => $locale,
                        'options'                => json_encode([
                            'html' => $section['html'],
                            'css' => $section['css'],
                        ]),
                    ]
                );
            }
        }
    }

    /**
     * Store image in storage.
     *
     * @return void
     */
    public function storeFileIfExists($targetPath, $file, $default = null)
    {
        if (file_exists(base_path(self::BASE_PATH . $file))) {
            return 'storage/' . Storage::putFile($targetPath, new File(base_path(self::BASE_PATH . $file)));
        }

        if (! $default) {
            return;
        }

        if (file_exists(base_path(self::BASE_PATH . $default))) {
            return 'storage/' . Storage::putFile($targetPath, new File(base_path(self::BASE_PATH . $default)));
        }
    }
}
