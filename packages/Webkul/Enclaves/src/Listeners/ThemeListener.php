<?php

namespace Webkul\Enclaves\Listeners;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Webkul\Core\Repositories\ChannelRepository;


class ThemeListener
{
    /**
     * After Customer is Create
     *
     * @return void
     */
    public function afterUpdateOrCreate($channel)
    {
        if(request()->input('cdn_image_links')) {
            $images = explode(',', request()->input('cdn_image_links'));

            foreach ($images as $image) {
                $imageType = explode('|', $image);

                $fileName = $imageType[3];

                $originalPath = 'channel/' . $channel->id. '/'. $fileName;

                $channel->{$imageType[0]} = $originalPath;

                Storage::move($imageType[2], $originalPath);
            }

            $channel->save();
        } else {
            $data = request()->all();

            app(ChannelRepository::class)->uploadImages($data, $channel, 'footer_logo');
        }
    }
}
