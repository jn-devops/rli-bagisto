<?php

namespace Webkul\Enclaves\Helpers\Customer;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Webkul\Customer\Repositories\CustomerRepository;

class CustomerHelper
{
    /**
     * Create a new helper instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
    ) {
    }

    /**
     * Update profile Image
     */
    public function updateProfile($data)
    {
        $manager = new ImageManager();

        $image = $manager->make(request()->file('image'))->encode('webp');

        $dir = 'customer/' . $data['customer_id'];

        $name = Str::random(5) . '.webp';

        $path = $dir . '/' . $name;

        $customer = $this->customerRepository->findOrFail($data['customer_id']);
        $customer->image = $path;
        $customer->save();
        
        if (request()->hasFile('image')) {
            if ($dir) {
                Storage::delete($dir);
            }

            Storage::put($path, $image);
        }

        return $customer;
    }
}
