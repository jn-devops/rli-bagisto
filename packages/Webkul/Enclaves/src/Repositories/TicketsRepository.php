<?php

namespace Webkul\Enclaves\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Contracts\Tickets;

class TicketsRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Tickets::class;
    }

    /**
     * Upload category's images.
     * TODO:: THIS FUNCTION WILL MOVE IN REPOS IN FUTURE.
     * 
     * @param  array  $data
     * @param  \Webkul\Category\Contracts\Category  $category
     * @param  string  $type
     * @return void
     */
    public function uploadImages($ticket)
    {
        $manager = new ImageManager();

        $image = $manager->make(request()->file('file'))->encode('webp');

        $dir = 'tickets/' . $ticket->id;

        $name = Str::random(5) . '.webp';

        $path = $dir . '/' . $name;

        $ticket->files()->insert([
            'name'      => $name,
            'path'      => $dir,
            'ticket_id' => $ticket->id,
        ]);

        if(request()->hasFile('file')) {
            if ($dir) {
                Storage::delete($dir);
            }

            Storage::put($path, $image);
        }
    }
}