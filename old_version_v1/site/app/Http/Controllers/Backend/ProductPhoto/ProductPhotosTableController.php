<?php

namespace App\Http\Controllers\Backend\ProductPhoto;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ProductPhoto\ProductPhotoRepository;
use App\Http\Requests\Backend\ProductPhoto\ManageProductPhotoRequest;

/**
 * Class ProductPhotosTableController.
 */
class ProductPhotosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductPhotoRepository
     */
    protected $productphoto;

    /**
     * contructor to initialize repository object
     * @param ProductPhotoRepository $productphoto;
     */
    public function __construct(ProductPhotoRepository $productphoto)
    {
        $this->productphoto = $productphoto;
    }

    /**
     * This method return the data of the model
     * @param ManageProductPhotoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductPhotoRequest $request)
    {
        return Datatables::of($this->productphoto->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($productphoto) {
                return Carbon::parse($productphoto->created_at)->toDateString();
            })
            ->addColumn('actions', function ($productphoto) {
                return $productphoto->action_buttons;
            })
            ->make(true);
    }
}
