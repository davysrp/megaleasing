<?php

namespace App\Http\Controllers\Backend\ECommerce;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ECommerce\ECommerceRepository;
use App\Http\Requests\Backend\ECommerce\ManageECommerceRequest;

/**
 * Class ECommercesTableController.
 */
class ECommercesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ECommerceRepository
     */
    protected $ecommerce;

    /**
     * contructor to initialize repository object
     * @param ECommerceRepository $ecommerce;
     */
    public function __construct(ECommerceRepository $ecommerce)
    {
        $this->ecommerce = $ecommerce;
    }

    /**
     * This method return the data of the model
     * @param ManageECommerceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageECommerceRequest $request)
    {
        return Datatables::of($this->ecommerce->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($ecommerce) {
                return Carbon::parse($ecommerce->created_at)->toDateString();
            })
            ->addColumn('actions', function ($ecommerce) {
                return $ecommerce->action_buttons;
            })
            ->make(true);
    }
}
