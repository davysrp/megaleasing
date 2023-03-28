<?php

namespace App\Http\Controllers\Backend\Slide;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Slide\SlideRepository;
use App\Http\Requests\Backend\Slide\ManageSlideRequest;

/**
 * Class SlidesTableController.
 */
class SlidesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SlideRepository
     */
    protected $slide;

    /**
     * contructor to initialize repository object
     * @param SlideRepository $slide;
     */
    public function __construct(SlideRepository $slide)
    {
        $this->slide = $slide;
    }

    /**
     * This method return the data of the model
     * @param ManageSlideRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSlideRequest $request)
    {
        return Datatables::of($this->slide->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($slide) {
                return Carbon::parse($slide->created_at)->toDateString();
            })
            ->addColumn('actions', function ($slide) {
                return $slide->action_buttons;
            })
            ->make(true);
    }
}
