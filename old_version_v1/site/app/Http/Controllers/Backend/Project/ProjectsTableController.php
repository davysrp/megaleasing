<?php

namespace App\Http\Controllers\Backend\Project;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Project\ProjectRepository;
use App\Http\Requests\Backend\Project\ManageProjectRequest;

/**
 * Class ProjectsTableController.
 */
class ProjectsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProjectRepository
     */
    protected $project;

    /**
     * contructor to initialize repository object
     * @param ProjectRepository $project;
     */
    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
    }

    /**
     * This method return the data of the model
     * @param ManageProjectRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProjectRequest $request)
    {
        return Datatables::of($this->project->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($project) {
                return Carbon::parse($project->created_at)->toDateString();
            })
            ->addColumn('actions', function ($project) {
                return $project->action_buttons;
            })
            ->make(true);
    }
}
