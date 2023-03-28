<?php

namespace App\Http\Controllers\Backend\ProductPhoto;

use App\Models\ProductPhoto\ProductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ProductPhoto\CreateResponse;
use App\Http\Responses\Backend\ProductPhoto\EditResponse;
use App\Repositories\Backend\ProductPhoto\ProductPhotoRepository;
use App\Http\Requests\Backend\ProductPhoto\ManageProductPhotoRequest;
use App\Http\Requests\Backend\ProductPhoto\CreateProductPhotoRequest;
use App\Http\Requests\Backend\ProductPhoto\StoreProductPhotoRequest;
use App\Http\Requests\Backend\ProductPhoto\EditProductPhotoRequest;
use App\Http\Requests\Backend\ProductPhoto\UpdateProductPhotoRequest;
use App\Http\Requests\Backend\ProductPhoto\DeleteProductPhotoRequest;

/**
 * ProductPhotosController
 */
class ProductPhotosController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductPhotoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProductPhotoRepository $repository;
     */
    public function __construct(ProductPhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ProductPhoto\ManageProductPhotoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProductPhotoRequest $request)
    {
        return new ViewResponse('backend.productphotos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ProductPhoto\CreateResponse
     */
    public function create(CreateProductPhotoRequest $request)
    {
        return new CreateResponse('backend.productphotos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProductPhotoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
//        return new RedirectResponse(route('admin.productphotos.index'), ['flash_success' => trans('alerts.backend.productphotos.created')]);
        return redirect()->back()->with(['flash_success' => trans('alerts.backend.productphotos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProductPhoto\ProductPhoto  $productphoto
     * @param  EditProductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ProductPhoto\EditResponse
     */
    public function edit(ProductPhoto $productphoto, EditProductPhotoRequest $request)
    {
        return new EditResponse($productphoto);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductPhotoRequestNamespace  $request
     * @param  App\Models\ProductPhoto\ProductPhoto  $productphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProductPhotoRequest $request, ProductPhoto $productphoto)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $productphoto, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.productphotos.index'), ['flash_success' => trans('alerts.backend.productphotos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductPhotoRequestNamespace  $request
     * @param  App\Models\ProductPhoto\ProductPhoto  $productphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ProductPhoto $productphoto, DeleteProductPhotoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($productphoto);
        //returning with successfull message
//        return new RedirectResponse(route('admin.productphotos.index'), ['flash_success' => trans('alerts.backend.productphotos.deleted')]);
        return redirect()->back()->with(['flash_success' => trans('alerts.backend.productphotos.deleted')]);
    }
    
}
