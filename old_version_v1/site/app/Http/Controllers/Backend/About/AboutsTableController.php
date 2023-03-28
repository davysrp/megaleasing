<?php

namespace App\Http\Controllers\Backend\About;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\About\AboutRepository;
use App\Http\Requests\Backend\About\ManageAboutRequest;

/**
 * Class AboutsTableController.
 */
class AboutsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutRepository
     */
    protected $about;

    /**
     * contructor to initialize repository object
     * @param AboutRepository $about;
     */
    public function __construct(AboutRepository $about)
    {
        $this->about = $about;
    }

    /**
     * This method return the data of the model
     * @param ManageAboutRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAboutRequest $request)
    {
        return Datatables::of($this->about->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($about) {
                return Carbon::parse($about->created_at)->toDateString();
            })
            ->addColumn('actions', function ($about) {
                return $about->action_buttons;
            })
            ->make(true);
    }
}
