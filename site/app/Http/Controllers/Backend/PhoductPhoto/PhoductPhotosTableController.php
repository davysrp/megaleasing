<?php

namespace App\Http\Controllers\Backend\PhoductPhoto;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PhoductPhoto\PhoductPhotoRepository;
use App\Http\Requests\Backend\PhoductPhoto\ManagePhoductPhotoRequest;

/**
 * Class PhoductPhotosTableController.
 */
class PhoductPhotosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhoductPhotoRepository
     */
    protected $phoductphoto;

    /**
     * contructor to initialize repository object
     * @param PhoductPhotoRepository $phoductphoto;
     */
    public function __construct(PhoductPhotoRepository $phoductphoto)
    {
        $this->phoductphoto = $phoductphoto;
    }

    /**
     * This method return the data of the model
     * @param ManagePhoductPhotoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePhoductPhotoRequest $request)
    {
        return Datatables::of($this->phoductphoto->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($phoductphoto) {
                return Carbon::parse($phoductphoto->created_at)->toDateString();
            })
            ->addColumn('actions', function ($phoductphoto) {
                return $phoductphoto->action_buttons;
            })
            ->make(true);
    }
}
