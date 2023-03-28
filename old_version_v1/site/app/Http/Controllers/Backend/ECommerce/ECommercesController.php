<?php

namespace App\Http\Controllers\Backend\ECommerce;

use App\Models\ECommerce\ECommerce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ECommerce\CreateResponse;
use App\Http\Responses\Backend\ECommerce\EditResponse;
use App\Repositories\Backend\ECommerce\ECommerceRepository;
use App\Http\Requests\Backend\ECommerce\ManageECommerceRequest;
use App\Http\Requests\Backend\ECommerce\CreateECommerceRequest;
use App\Http\Requests\Backend\ECommerce\StoreECommerceRequest;
use App\Http\Requests\Backend\ECommerce\EditECommerceRequest;
use App\Http\Requests\Backend\ECommerce\UpdateECommerceRequest;
use App\Http\Requests\Backend\ECommerce\DeleteECommerceRequest;

/**
 * ECommercesController
 */
class ECommercesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ECommerceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ECommerceRepository $repository;
     */
    public function __construct(ECommerceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ECommerce\ManageECommerceRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageECommerceRequest $request)
    {
        return new ViewResponse('backend.ecommerces.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateECommerceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ECommerce\CreateResponse
     */
    public function create(CreateECommerceRequest $request)
    {
        return new CreateResponse('backend.ecommerces.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreECommerceRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreECommerceRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.ecommerces.index'), ['flash_success' => trans('alerts.backend.ecommerces.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ECommerce\ECommerce  $ecommerce
     * @param  EditECommerceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ECommerce\EditResponse
     */
    public function edit(ECommerce $ecommerce, EditECommerceRequest $request)
    {
        return new EditResponse($ecommerce);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateECommerceRequestNamespace  $request
     * @param  App\Models\ECommerce\ECommerce  $ecommerce
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateECommerceRequest $request, ECommerce $ecommerce)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $ecommerce, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.ecommerces.index'), ['flash_success' => trans('alerts.backend.ecommerces.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteECommerceRequestNamespace  $request
     * @param  App\Models\ECommerce\ECommerce  $ecommerce
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ECommerce $ecommerce, DeleteECommerceRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($ecommerce);
        //returning with successfull message
        return new RedirectResponse(route('admin.ecommerces.index'), ['flash_success' => trans('alerts.backend.ecommerces.deleted')]);
    }
    
}
