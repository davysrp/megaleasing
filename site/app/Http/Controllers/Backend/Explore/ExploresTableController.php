<?php

namespace App\Http\Controllers\Backend\Explore;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Explore\ExploreRepository;
use App\Http\Requests\Backend\Explore\ManageExploreRequest;

/**
 * Class ExploresTableController.
 */
class ExploresTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExploreRepository
     */
    protected $explore;

    /**
     * contructor to initialize repository object
     * @param ExploreRepository $explore;
     */
    public function __construct(ExploreRepository $explore)
    {
        $this->explore = $explore;
    }

    /**
     * This method return the data of the model
     * @param ManageExploreRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageExploreRequest $request)
    {
        return Datatables::of($this->explore->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($explore) {
                return Carbon::parse($explore->created_at)->toDateString();
            })
            ->addColumn('actions', function ($explore) {
                return $explore->action_buttons;
            })
            ->make(true);
    }
}
