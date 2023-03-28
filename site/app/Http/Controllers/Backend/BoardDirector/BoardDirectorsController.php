<?php

namespace App\Http\Controllers\Backend\BoardDirector;

use App\Models\BoardDirector\BoardDirector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\BoardDirector\CreateResponse;
use App\Http\Responses\Backend\BoardDirector\EditResponse;
use App\Repositories\Backend\BoardDirector\BoardDirectorRepository;
use App\Http\Requests\Backend\BoardDirector\ManageBoardDirectorRequest;
use App\Http\Requests\Backend\BoardDirector\CreateBoardDirectorRequest;
use App\Http\Requests\Backend\BoardDirector\StoreBoardDirectorRequest;
use App\Http\Requests\Backend\BoardDirector\EditBoardDirectorRequest;
use App\Http\Requests\Backend\BoardDirector\UpdateBoardDirectorRequest;
use App\Http\Requests\Backend\BoardDirector\DeleteBoardDirectorRequest;

/**
 * BoardDirectorsController
 */
class BoardDirectorsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BoardDirectorRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BoardDirectorRepository $repository;
     */
    public function __construct(BoardDirectorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\BoardDirector\ManageBoardDirectorRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBoardDirectorRequest $request)
    {
        return new ViewResponse('backend.boarddirectors.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBoardDirectorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BoardDirector\CreateResponse
     */
    public function create(CreateBoardDirectorRequest $request)
    {
        return new CreateResponse('backend.boarddirectors.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBoardDirectorRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBoardDirectorRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.boarddirectors.index'), ['flash_success' => trans('alerts.backend.boarddirectors.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\BoardDirector\BoardDirector  $boarddirector
     * @param  EditBoardDirectorRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BoardDirector\EditResponse
     */
    public function edit(BoardDirector $boarddirector, EditBoardDirectorRequest $request)
    {
        return new EditResponse($boarddirector);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBoardDirectorRequestNamespace  $request
     * @param  App\Models\BoardDirector\BoardDirector  $boarddirector
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBoardDirectorRequest $request, BoardDirector $boarddirector)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $boarddirector, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.boarddirectors.index'), ['flash_success' => trans('alerts.backend.boarddirectors.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBoardDirectorRequestNamespace  $request
     * @param  App\Models\BoardDirector\BoardDirector  $boarddirector
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(BoardDirector $boarddirector, DeleteBoardDirectorRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($boarddirector);
        //returning with successfull message
        return new RedirectResponse(route('admin.boarddirectors.index'), ['flash_success' => trans('alerts.backend.boarddirectors.deleted')]);
    }
    
}
