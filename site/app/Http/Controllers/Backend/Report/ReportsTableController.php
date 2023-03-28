<?php

namespace App\Http\Controllers\Backend\Report;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Report\ManageReportRequest;

/**
 * Class ReportsTableController.
 */
class ReportsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReportRepository
     */
    protected $report;

    /**
     * contructor to initialize repository object
     * @param ReportRepository $report;
     */
    public function __construct(ReportRepository $report)
    {
        $this->report = $report;
    }

    /**
     * This method return the data of the model
     * @param ManageReportRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReportRequest $request)
    {
        return Datatables::of($this->report->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($report) {
                return Carbon::parse($report->created_at)->toDateString();
            })
            ->addColumn('actions', function ($report) {
                return $report->action_buttons;
            })
            ->make(true);
    }
}
