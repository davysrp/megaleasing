<?php

namespace App\Http\Controllers\Backend\Branch;

use App\Models\Branch\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Branch\CreateResponse;
use App\Http\Responses\Backend\Branch\EditResponse;
use App\Repositories\Backend\Branch\BranchRepository;
use App\Http\Requests\Backend\Branch\ManageBranchRequest;
use App\Http\Requests\Backend\Branch\CreateBranchRequest;
use App\Http\Requests\Backend\Branch\StoreBranchRequest;
use App\Http\Requests\Backend\Branch\EditBranchRequest;
use App\Http\Requests\Backend\Branch\UpdateBranchRequest;
use App\Http\Requests\Backend\Branch\DeleteBranchRequest;

/**
 * BranchesController
 */
class BranchesController extends Controller
{
    /**
     * variable to store the repository object
     * @var BranchRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BranchRepository $repository;
     */
    public function __construct(BranchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Branch\ManageBranchRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBranchRequest $request)
    {
        return new ViewResponse('backend.branches.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBranchRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Branch\CreateResponse
     */
    public function create(CreateBranchRequest $request)
    {
        return new CreateResponse('backend.branches.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBranchRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBranchRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.branches.index'), ['flash_success' => trans('alerts.backend.branches.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Branch\Branch  $branch
     * @param  EditBranchRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Branch\EditResponse
     */
    public function edit(Branch $branch, EditBranchRequest $request)
    {
        return new EditResponse($branch);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBranchRequestNamespace  $request
     * @param  App\Models\Branch\Branch  $branch
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $branch, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.branches.index'), ['flash_success' => trans('alerts.backend.branches.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBranchRequestNamespace  $request
     * @param  App\Models\Branch\Branch  $branch
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Branch $branch, DeleteBranchRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($branch);
        //returning with successfull message
        return new RedirectResponse(route('admin.branches.index'), ['flash_success' => trans('alerts.backend.branches.deleted')]);
    }
    
}
