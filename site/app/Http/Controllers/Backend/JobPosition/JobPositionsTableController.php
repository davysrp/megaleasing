<?php

namespace App\Http\Controllers\Backend\JobPosition;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\JobPosition\JobPositionRepository;
use App\Http\Requests\Backend\JobPosition\ManageJobPositionRequest;

/**
 * Class JobPositionsTableController.
 */
class JobPositionsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var JobPositionRepository
     */
    protected $jobposition;

    /**
     * contructor to initialize repository object
     * @param JobPositionRepository $jobposition;
     */
    public function __construct(JobPositionRepository $jobposition)
    {
        $this->jobposition = $jobposition;
    }

    /**
     * This method return the data of the model
     * @param ManageJobPositionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageJobPositionRequest $request)
    {
        return Datatables::of($this->jobposition->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($jobposition) {
                return Carbon::parse($jobposition->created_at)->toDateString();
            })
            ->addColumn('actions', function ($jobposition) {
                return $jobposition->action_buttons;
            })
            ->make(true);
    }
}
