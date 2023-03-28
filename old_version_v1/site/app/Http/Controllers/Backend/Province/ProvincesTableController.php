<?php

namespace App\Http\Controllers\Backend\Province;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Province\ProvinceRepository;
use App\Http\Requests\Backend\Province\ManageProvinceRequest;

/**
 * Class ProvincesTableController.
 */
class ProvincesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProvinceRepository
     */
    protected $province;

    /**
     * contructor to initialize repository object
     * @param ProvinceRepository $province;
     */
    public function __construct(ProvinceRepository $province)
    {
        $this->province = $province;
    }

    /**
     * This method return the data of the model
     * @param ManageProvinceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProvinceRequest $request)
    {
        return Datatables::of($this->province->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($province) {
                return Carbon::parse($province->created_at)->toDateString();
            })
            ->addColumn('actions', function ($province) {
                return $province->action_buttons;
            })
            ->make(true);
    }
}
