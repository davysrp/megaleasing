<?php

namespace App\Http\Controllers\Backend\Career;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Career\CareerRepository;
use App\Http\Requests\Backend\Career\ManageCareerRequest;

/**
 * Class CareersTableController.
 */
class CareersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CareerRepository
     */
    protected $career;

    /**
     * contructor to initialize repository object
     * @param CareerRepository $career;
     */
    public function __construct(CareerRepository $career)
    {
        $this->career = $career;
    }

    /**
     * This method return the data of the model
     * @param ManageCareerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCareerRequest $request)
    {
        return Datatables::of($this->career->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($career) {
                return Carbon::parse($career->created_at)->toDateString();
            })
            ->addColumn('actions', function ($career) {
                return $career->action_buttons;
            })
            ->make(true);
    }
}
