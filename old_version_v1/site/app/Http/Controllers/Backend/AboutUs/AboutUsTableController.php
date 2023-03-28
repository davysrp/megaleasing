<?php

namespace App\Http\Controllers\Backend\AboutUs;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\AboutUs\AboutURepository;
use App\Http\Requests\Backend\AboutUs\ManageAboutURequest;

/**
 * Class AboutUsTableController.
 */
class AboutUsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutURepository
     */
    protected $aboutu;

    /**
     * contructor to initialize repository object
     * @param AboutURepository $aboutu;
     */
    public function __construct(AboutURepository $aboutu)
    {
        $this->aboutu = $aboutu;
    }

    /**
     * This method return the data of the model
     * @param ManageAboutURequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAboutURequest $request)
    {
        return Datatables::of($this->aboutu->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($aboutu) {
                return Carbon::parse($aboutu->created_at)->toDateString();
            })
            ->addColumn('actions', function ($aboutu) {
                return $aboutu->action_buttons;
            })
            ->make(true);
    }
}
