<?php

namespace App\Http\Controllers\Backend\ManagementTeam;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ManagementTeam\ManagementTeamRepository;
use App\Http\Requests\Backend\ManagementTeam\ManageManagementTeamRequest;

/**
 * Class ManagementTeamsTableController.
 */
class ManagementTeamsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ManagementTeamRepository
     */
    protected $managementteam;

    /**
     * contructor to initialize repository object
     * @param ManagementTeamRepository $managementteam;
     */
    public function __construct(ManagementTeamRepository $managementteam)
    {
        $this->managementteam = $managementteam;
    }

    /**
     * This method return the data of the model
     * @param ManageManagementTeamRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageManagementTeamRequest $request)
    {
        return Datatables::of($this->managementteam->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($managementteam) {
                return Carbon::parse($managementteam->created_at)->toDateString();
            })
            ->addColumn('actions', function ($managementteam) {
                return $managementteam->action_buttons;
            })
            ->make(true);
    }
}
