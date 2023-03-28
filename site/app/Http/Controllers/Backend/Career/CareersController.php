<?php

namespace App\Http\Controllers\Backend\Career;

use App\Models\Career\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Career\CreateResponse;
use App\Http\Responses\Backend\Career\EditResponse;
use App\Repositories\Backend\Career\CareerRepository;
use App\Http\Requests\Backend\Career\ManageCareerRequest;
use App\Http\Requests\Backend\Career\CreateCareerRequest;
use App\Http\Requests\Backend\Career\StoreCareerRequest;
use App\Http\Requests\Backend\Career\EditCareerRequest;
use App\Http\Requests\Backend\Career\UpdateCareerRequest;
use App\Http\Requests\Backend\Career\DeleteCareerRequest;

/**
 * CareersController
 */
class CareersController extends Controller
{
    /**
     * variable to store the repository object
     * @var CareerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CareerRepository $repository;
     */
    public function __construct(CareerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Career\ManageCareerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCareerRequest $request)
    {
        return new ViewResponse('backend.careers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCareerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Career\CreateResponse
     */
    public function create(CreateCareerRequest $request)
    {
        return new CreateResponse('backend.careers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCareerRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCareerRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.careers.index'), ['flash_success' => trans('alerts.backend.careers.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Career\Career  $career
     * @param  EditCareerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Career\EditResponse
     */
    public function edit(Career $career, EditCareerRequest $request)
    {
        return new EditResponse($career);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCareerRequestNamespace  $request
     * @param  App\Models\Career\Career  $career
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $career, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.careers.index'), ['flash_success' => trans('alerts.backend.careers.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCareerRequestNamespace  $request
     * @param  App\Models\Career\Career  $career
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Career $career, DeleteCareerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($career);
        //returning with successfull message
        return new RedirectResponse(route('admin.careers.index'), ['flash_success' => trans('alerts.backend.careers.deleted')]);
    }
    
}
