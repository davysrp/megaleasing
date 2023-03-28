<?php

namespace App\Http\Controllers\Backend\Province;

use App\Models\Province\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Province\CreateResponse;
use App\Http\Responses\Backend\Province\EditResponse;
use App\Repositories\Backend\Province\ProvinceRepository;
use App\Http\Requests\Backend\Province\ManageProvinceRequest;
use App\Http\Requests\Backend\Province\CreateProvinceRequest;
use App\Http\Requests\Backend\Province\StoreProvinceRequest;
use App\Http\Requests\Backend\Province\EditProvinceRequest;
use App\Http\Requests\Backend\Province\UpdateProvinceRequest;
use App\Http\Requests\Backend\Province\DeleteProvinceRequest;

/**
 * ProvincesController
 */
class ProvincesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProvinceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProvinceRepository $repository;
     */
    public function __construct(ProvinceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Province\ManageProvinceRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProvinceRequest $request)
    {
        return new ViewResponse('backend.provinces.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProvinceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Province\CreateResponse
     */
    public function create(CreateProvinceRequest $request)
    {
        return new CreateResponse('backend.provinces.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProvinceRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProvinceRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.provinces.index'), ['flash_success' => trans('alerts.backend.provinces.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Province\Province  $province
     * @param  EditProvinceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Province\EditResponse
     */
    public function edit(Province $province, EditProvinceRequest $request)
    {
        return new EditResponse($province);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProvinceRequestNamespace  $request
     * @param  App\Models\Province\Province  $province
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProvinceRequest $request, Province $province)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $province, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.provinces.index'), ['flash_success' => trans('alerts.backend.provinces.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProvinceRequestNamespace  $request
     * @param  App\Models\Province\Province  $province
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Province $province, DeleteProvinceRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($province);
        //returning with successfull message
        return new RedirectResponse(route('admin.provinces.index'), ['flash_success' => trans('alerts.backend.provinces.deleted')]);
    }
    
}
