<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Partner;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Helpers\Customer\CustomerHelper;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Blog\Repositories\BlogRepository;


class PartnersController extends Controller
{
    /**
     * Using const variable for status
     *
     * @var int Status
     */
    protected const STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected BlogRepository $blogRepository,
    ) {}

    /**
     * Show the view for the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('enclaves::shop.partners.index');
    }

    public function view($id)
    {
        $blog = $this->blogRepository
            ->where('slug', 'pag-ibig-star-awards-2023')
            ->firstOrFail();

        $blogSeoMetaTitle = 'Demo meta tile';

        $blogSeoMetaKeywords = 'Demo meta keywords';

        $blogSeoMetaDescription = 'Demo meta descripotoin';

        if (request()->ajax()) {
            return new JsonResponse(['blog' => $blog]);
        }

        $limit = 5;

        return view('enclaves::shop.partners.view', compact(
            'blog',
            'limit',
            'blogSeoMetaTitle',
            'blogSeoMetaKeywords',
            'blogSeoMetaDescription'
        ));
    }

    public function handle(Request $request)
    {

        $action = $request->input('action');
        $data = $request->input('data');

        switch ($action) {
            case 'create':
                return $this->create($data);

            case 'read':
                return $this->read($data);

            case 'update':
                return $this->update($data);

            case 'delete':
                return $this->delete($data);

            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    }

    // Create (POST)
    protected function create($data)
    {
        // $item = YourModel::create($data);
        // return response()->json(['status' => 'created', 'item' => $item], 201);
    }

    // Read (GET)
    protected function read($data)
    {
        // $item = YourModel::find($data['id']);
        // if ($item) {
        //     return response()->json(['status' => 'found', 'item' => $item], 200);
        // }
        // return response()->json(['status' => 'not found'], 404);
    }

    // Update (PUT)
    protected function update($data)
    {
        // $item = YourModel::find($data['id']);
        // if ($item) {
        //     $item->update($data);
        //     return response()->json(['status' => 'updated', 'item' => $item], 200);
        // }
        // return response()->json(['status' => 'not found'], 404);
    }

    // Delete (DELETE)
    protected function delete($data)
    {
        // $item = YourModel::find($data['id']);
        // if ($item) {
        //     $item->delete();
        //     return response()->json(['status' => 'deleted'], 200);
        // }
        // return response()->json(['status' => 'not found'], 404);
    }
}
