<?php

namespace App\Http\Controllers\Backend\JobPosition;

use App\Models\JobPosition\JobPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\JobPosition\CreateResponse;
use App\Http\Responses\Backend\JobPosition\EditResponse;
use App\Repositories\Backend\JobPosition\JobPositionRepository;
use App\Http\Requests\Backend\JobPosition\ManageJobPositionRequest;
use App\Http\Requests\Backend\JobPosition\CreateJobPositionRequest;
use App\Http\Requests\Backend\JobPosition\StoreJobPositionRequest;
use App\Http\Requests\Backend\JobPosition\EditJobPositionRequest;
use App\Http\Requests\Backend\JobPosition\UpdateJobPositionRequest;
use App\Http\Requests\Backend\JobPosition\DeleteJobPositionRequest;

/**
 * JobPositionsController
 */
class JobPositionsController extends Controller
{
    /**
     * variable to store the repository object
     * @var JobPositionRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param JobPositionRepository $repository;
     */
    public function __construct(JobPositionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\JobPosition\ManageJobPositionRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageJobPositionRequest $request)
    {
        return new ViewResponse('backend.jobpositions.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateJobPositionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\JobPosition\CreateResponse
     */
    public function create(CreateJobPositionRequest $request)
    {
        return new CreateResponse('backend.jobpositions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreJobPositionRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreJobPositionRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.jobpositions.index'), ['flash_success' => trans('alerts.backend.jobpositions.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\JobPosition\JobPosition  $jobposition
     * @param  EditJobPositionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\JobPosition\EditResponse
     */
    public function edit(JobPosition $jobposition, EditJobPositionRequest $request)
    {
        return new EditResponse($jobposition);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateJobPositionRequestNamespace  $request
     * @param  App\Models\JobPosition\JobPosition  $jobposition
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateJobPositionRequest $request, JobPosition $jobposition)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $jobposition, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.jobpositions.index'), ['flash_success' => trans('alerts.backend.jobpositions.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteJobPositionRequestNamespace  $request
     * @param  App\Models\JobPosition\JobPosition  $jobposition
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(JobPosition $jobposition, DeleteJobPositionRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($jobposition);
        //returning with successfull message
        return new RedirectResponse(route('admin.jobpositions.index'), ['flash_success' => trans('alerts.backend.jobpositions.deleted')]);
    }
    
}
