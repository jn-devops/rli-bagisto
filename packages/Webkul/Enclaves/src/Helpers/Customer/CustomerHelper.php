<?php

namespace Webkul\Enclaves\Helpers\Customer;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Webkul\Customer\Repositories\CustomerRepository;

class CustomerHelper
{
    /**
     * Create a new helper instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @return  void
     */
    public function  __construct(
        protected CustomerRepository $customerRepository,
    ) {
    }

    /**
     * Update profile Imagfe
     */
    public function updateProfile($data) 
    {
        $manager = new ImageManager();

        $image = $manager->make(request()->file('image'))->encode('webp');
       
        $dir = 'customer/' . $data['customer_id'];

        $name = Str::random(5) . '.webp';

        $path = $dir . '/' . $name;

        $updateData = [
            'image' => $path
        ];
      
        $customer = $this->customerRepository->update($updateData, $data['customer_id']);

        if(request()->hasFile('image')) {
            if ($dir) {
                Storage::delete($dir);
            }

            Storage::put($path, $image);
        }

        return $customer;
    }

}