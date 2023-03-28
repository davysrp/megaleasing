<?php

namespace App\Http\Controllers\Backend\Explore;

use App\Models\Explore\Explore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Explore\CreateResponse;
use App\Http\Responses\Backend\Explore\EditResponse;
use App\Repositories\Backend\Explore\ExploreRepository;
use App\Http\Requests\Backend\Explore\ManageExploreRequest;
use App\Http\Requests\Backend\Explore\CreateExploreRequest;
use App\Http\Requests\Backend\Explore\StoreExploreRequest;
use App\Http\Requests\Backend\Explore\EditExploreRequest;
use App\Http\Requests\Backend\Explore\UpdateExploreRequest;
use App\Http\Requests\Backend\Explore\DeleteExploreRequest;

/**
 * ExploresController
 */
class ExploresController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExploreRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ExploreRepository $repository;
     */
    public function __construct(ExploreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Explore\ManageExploreRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageExploreRequest $request)
    {
        return new ViewResponse('backend.explores.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateExploreRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Explore\CreateResponse
     */
    public function create(CreateExploreRequest $request)
    {
        return new CreateResponse('backend.explores.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExploreRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreExploreRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.explores.index'), ['flash_success' => trans('alerts.backend.explores.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Explore\Explore  $explore
     * @param  EditExploreRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Explore\EditResponse
     */
    public function edit(Explore $explore, EditExploreRequest $request)
    {
        return new EditResponse($explore);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExploreRequestNamespace  $request
     * @param  App\Models\Explore\Explore  $explore
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateExploreRequest $request, Explore $explore)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $explore, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.explores.index'), ['flash_success' => trans('alerts.backend.explores.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteExploreRequestNamespace  $request
     * @param  App\Models\Explore\Explore  $explore
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Explore $explore, DeleteExploreRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($explore);
        //returning with successfull message
        return new RedirectResponse(route('admin.explores.index'), ['flash_success' => trans('alerts.backend.explores.deleted')]);
    }
    
}
