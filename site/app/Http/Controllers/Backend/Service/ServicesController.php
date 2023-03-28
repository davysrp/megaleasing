<?php

namespace App\Http\Controllers\Backend\Service;

use App\Models\Service\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Service\CreateResponse;
use App\Http\Responses\Backend\Service\EditResponse;
use App\Repositories\Backend\Service\ServiceRepository;
use App\Http\Requests\Backend\Service\ManageServiceRequest;
use App\Http\Requests\Backend\Service\CreateServiceRequest;
use App\Http\Requests\Backend\Service\StoreServiceRequest;
use App\Http\Requests\Backend\Service\EditServiceRequest;
use App\Http\Requests\Backend\Service\UpdateServiceRequest;
use App\Http\Requests\Backend\Service\DeleteServiceRequest;

/**
 * ServicesController
 */
class ServicesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ServiceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ServiceRepository $repository;
     */
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Service\ManageServiceRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageServiceRequest $request)
    {
        return new ViewResponse('backend.services.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateServiceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Service\CreateResponse
     */
    public function create(CreateServiceRequest $request)
    {
        return new CreateResponse('backend.services.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreServiceRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreServiceRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.services.index'), ['flash_success' => trans('alerts.backend.services.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Service\Service  $service
     * @param  EditServiceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Service\EditResponse
     */
    public function edit(Service $service, EditServiceRequest $request)
    {
        return new EditResponse($service);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateServiceRequestNamespace  $request
     * @param  App\Models\Service\Service  $service
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $service, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.services.index'), ['flash_success' => trans('alerts.backend.services.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteServiceRequestNamespace  $request
     * @param  App\Models\Service\Service  $service
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Service $service, DeleteServiceRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($service);
        //returning with successfull message
        return new RedirectResponse(route('admin.services.index'), ['flash_success' => trans('alerts.backend.services.deleted')]);
    }
    
}
