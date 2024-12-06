<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Customer;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Core\Repositories\SubscribersListRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Enclaves\Http\Requests\Customer\ProfileRequest;
use Webkul\Enclaves\Repositories\CustomerAttributeRepository;
use Webkul\Enclaves\Repositories\CustomerAttributeValueRepository;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected ProductReviewRepository $productReviewRepository,
        protected SubscribersListRepository $subscriptionRepository,
        protected CustomerAttributeRepository $customerAttributeRepository,
        protected CustomerAttributeValueRepository $customerAttributeValueRepository,
    ) {}

    /**
     * customer to profile id.
     */
    private function customerId(): int
    {
        return auth()->guard('customer')->user()->id;
    }

    /**
     * customer to profile.
     */
    private function getCustomer(): mixed
    {
        return $this->customerRepository->findOrFail(self::customerId());
    }

    /**
     * customer to profile.
     *
     * @param int $id
     * @return mixed
     */
    private function getAttributesValues($id)
    {
        return $this->customerAttributeValueRepository
            ->findWhere(['customer_id' => $id])
            ->groupBy('form_type');
    }

    /**
     * Taking the customer to profile details page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = self::getCustomer();
        $customer->age =  Carbon::parse($customer->date_of_birth)->age;
        $customer->attributes = $this->getAttributesValues($customer->id);

        return view('shop::customers.account.custom-profile.index', compact('customer'));
    }

    /**
     * For loading the edit form page.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $customer = self::getCustomer();

        return view('shop::customers.account.profile.edit', compact('customer'));
    }

    /**
     * Edit function for editing customer profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $profileRequest): JsonResponse
    {
        $data = $profileRequest->validated();

        $data['customer_id'] = self::customerId();

        $data['attribute_id'] = $this->customerAttributeRepository->findOneByField(['code' => $data['name'], 'form_type' => $data['formType']])?->id;

        $customer = $this->customerAttributeValueRepository->updateOrCreate([
            'customer_id'  => $data['customer_id'],
            'attribute_id' => $data['attribute_id'],
            'form_type'    => $data['formType'],
        ], $data);

        if ($customer) {
            return new JsonResponse([
                'message' => [
                    'success' => trans('shop::app.customers.account.profile.edit-success'),
                ],
            ]);
        }

        return new JsonResponse([
            'message' => [
                'fail' => trans('shop::app.customer.account.profile.edit-fail'),
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $customerRepository = self::getCustomer();

        try {
            if (Hash::check(request()->input('password'), $customerRepository->password)) {

                if ($customerRepository->orders->whereIn('status', ['pending', 'processing'])->first()) {
                    session()->flash('error', trans('shop::app.customers.account.profile.order-pending'));

                    return redirect()->route('shop.customers.account.profile.index');
                } else {
                    $this->customerRepository->delete(self::customerId());

                    session()->flash('success', trans('shop::app.customers.account.profile.delete-success'));

                    return redirect()->route('shop.customer.session.index');
                }
            } else {
                session()->flash('error', trans('shop::app.customers.account.profile.wrong-password'));

                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('error', trans('shop::app.customers.account.profile.delete-failed'));

            return redirect()->route('shop.customers.account.profile.index');
        }
    }

    /**
     * Load the view for the customer account panel, showing approved reviews.
     *
     * @return \Illuminate\View\View
     */
    public function reviews()
    {
        $reviews = $this->productReviewRepository->getCustomerReview();

        return view('shop::customers.account.reviews.index', compact('reviews'));
    }

    /**
     * get profile form attribute.
     */
    public function getAttributes(): JsonResponse
    {
        $attributesAndOptions = $this->customerAttributeRepository->with('options')->get()->groupBy('form_type');

        $values = $this->attributeValues($attributesAndOptions);

        return new JsonResponse([
            'attributes' => $attributesAndOptions,
            'values'     => $values,
        ]);
    }

    /**
     * find all attributes values
     *
     * @param  mixed  $attributesAndOptions
     */
    public function attributeValues($attributesAndOptions): mixed
    {
        $values = [];

        $customer_id = self::customerId();

        foreach ($attributesAndOptions as $type => $attributes) {
            foreach ($attributes as $attribute) {
                $values[$type][$attribute->code] = $this->customerAttributeValueRepository
                    ->findOneByField([
                        'attribute_id' => $attribute->id,
                        'name'         => $attribute->code,
                        'customer_id'  => $customer_id,
                    ])?->value;
            }
        }

        return $values;
    }
}
