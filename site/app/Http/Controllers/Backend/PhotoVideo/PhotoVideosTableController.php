<?php

namespace App\Http\Controllers\Backend\PhotoVideo;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PhotoVideo\PhotoVideoRepository;
use App\Http\Requests\Backend\PhotoVideo\ManagePhotoVideoRequest;

/**
 * Class PhotoVideosTableController.
 */
class PhotoVideosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhotoVideoRepository
     */
    protected $photovideo;

    /**
     * contructor to initialize repository object
     * @param PhotoVideoRepository $photovideo;
     */
    public function __construct(PhotoVideoRepository $photovideo)
    {
        $this->photovideo = $photovideo;
    }

    /**
     * This method return the data of the model
     * @param ManagePhotoVideoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePhotoVideoRequest $request)
    {
        return Datatables::of($this->photovideo->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($photovideo) {
                return Carbon::parse($photovideo->created_at)->toDateString();
            })
            ->addColumn('actions', function ($photovideo) {
                return $photovideo->action_buttons;
            })
            ->make(true);
    }
}
