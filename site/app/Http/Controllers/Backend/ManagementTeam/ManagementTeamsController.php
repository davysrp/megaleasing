<?php

namespace App\Http\Controllers\Backend\ManagementTeam;

use App\Models\ManagementTeam\ManagementTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ManagementTeam\CreateResponse;
use App\Http\Responses\Backend\ManagementTeam\EditResponse;
use App\Repositories\Backend\ManagementTeam\ManagementTeamRepository;
use App\Http\Requests\Backend\ManagementTeam\ManageManagementTeamRequest;
use App\Http\Requests\Backend\ManagementTeam\CreateManagementTeamRequest;
use App\Http\Requests\Backend\ManagementTeam\StoreManagementTeamRequest;
use App\Http\Requests\Backend\ManagementTeam\EditManagementTeamRequest;
use App\Http\Requests\Backend\ManagementTeam\UpdateManagementTeamRequest;
use App\Http\Requests\Backend\ManagementTeam\DeleteManagementTeamRequest;

/**
 * ManagementTeamsController
 */
class ManagementTeamsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ManagementTeamRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ManagementTeamRepository $repository;
     */
    public function __construct(ManagementTeamRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ManagementTeam\ManageManagementTeamRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageManagementTeamRequest $request)
    {
        return new ViewResponse('backend.managementteams.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateManagementTeamRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ManagementTeam\CreateResponse
     */
    public function create(CreateManagementTeamRequest $request)
    {
        return new CreateResponse('backend.managementteams.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreManagementTeamRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreManagementTeamRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.managementteams.index'), ['flash_success' => trans('alerts.backend.managementteams.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ManagementTeam\ManagementTeam  $managementteam
     * @param  EditManagementTeamRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ManagementTeam\EditResponse
     */
    public function edit(ManagementTeam $managementteam, EditManagementTeamRequest $request)
    {
        return new EditResponse($managementteam);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateManagementTeamRequestNamespace  $request
     * @param  App\Models\ManagementTeam\ManagementTeam  $managementteam
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateManagementTeamRequest $request, ManagementTeam $managementteam)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $managementteam, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.managementteams.index'), ['flash_success' => trans('alerts.backend.managementteams.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteManagementTeamRequestNamespace  $request
     * @param  App\Models\ManagementTeam\ManagementTeam  $managementteam
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ManagementTeam $managementteam, DeleteManagementTeamRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($managementteam);
        //returning with successfull message
        return new RedirectResponse(route('admin.managementteams.index'), ['flash_success' => trans('alerts.backend.managementteams.deleted')]);
    }
    
}
