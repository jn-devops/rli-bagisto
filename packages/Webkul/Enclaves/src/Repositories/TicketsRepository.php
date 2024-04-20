<?php

namespace Webkul\Enclaves\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Webkul\Core\Eloquent\Repository;
use Webkul\Enclaves\Models\Tickets;

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

        if (request()->hasFile('file')) {
            if ($dir) {
                Storage::delete($dir);
            }

            Storage::put($path, $image);
        }
    }

    /**
     * @param  array  $data
     * @param  \Webkul\Category\Contracts\Category  $category
     * @param  string  $type
     * @return void
     */
    public function uploadMultipleImages($ticket)
    {
        $manager = new ImageManager();

        $dir = 'tickets/' . $ticket->id;

        foreach (request()->file('file') as $key => $file) {
            $image = $manager->make($file)->encode('webp');

            $name = Str::random(5) . '_' . $key . '.webp';

            $path = $dir . '/' . $name;

            $ticket->files()->insert([
                'name'      => $name,
                'path'      => $dir,
                'ticket_id' => $ticket->id,
            ]);

            if (request()->hasFile('file')) {
                if ($dir) {
                    Storage::delete($dir);
                }

                Storage::put($path, $image);
            }
        }
    }
}
