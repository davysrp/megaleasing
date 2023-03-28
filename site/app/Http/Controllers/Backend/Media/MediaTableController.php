<?php

namespace App\Http\Controllers\Backend\Media;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Media\MediumRepository;
use App\Http\Requests\Backend\Media\ManageMediumRequest;

/**
 * Class MediaTableController.
 */
class MediaTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var MediumRepository
     */
    protected $medium;

    /**
     * contructor to initialize repository object
     * @param MediumRepository $medium;
     */
    public function __construct(MediumRepository $medium)
    {
        $this->medium = $medium;
    }

    /**
     * This method return the data of the model
     * @param ManageMediumRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMediumRequest $request)
    {
        return Datatables::of($this->medium->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($medium) {
                return Carbon::parse($medium->created_at)->toDateString();
            })
            ->addColumn('actions', function ($medium) {
                return $medium->action_buttons;
            })
            ->make(true);
    }
}
