<?php

namespace App\Http\Controllers\Backend\BoardDirector;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\BoardDirector\BoardDirectorRepository;
use App\Http\Requests\Backend\BoardDirector\ManageBoardDirectorRequest;

/**
 * Class BoardDirectorsTableController.
 */
class BoardDirectorsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BoardDirectorRepository
     */
    protected $boarddirector;

    /**
     * contructor to initialize repository object
     * @param BoardDirectorRepository $boarddirector;
     */
    public function __construct(BoardDirectorRepository $boarddirector)
    {
        $this->boarddirector = $boarddirector;
    }

    /**
     * This method return the data of the model
     * @param ManageBoardDirectorRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBoardDirectorRequest $request)
    {
        return Datatables::of($this->boarddirector->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($boarddirector) {
                return Carbon::parse($boarddirector->created_at)->toDateString();
            })
            ->addColumn('actions', function ($boarddirector) {
                return $boarddirector->action_buttons;
            })
            ->make(true);
    }
}
