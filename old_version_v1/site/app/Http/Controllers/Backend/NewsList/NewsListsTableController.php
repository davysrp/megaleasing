<?php

namespace App\Http\Controllers\Backend\NewsList;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\NewsList\NewsListRepository;
use App\Http\Requests\Backend\NewsList\ManageNewsListRequest;

/**
 * Class NewsListsTableController.
 */
class NewsListsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewsListRepository
     */
    protected $newslist;

    /**
     * contructor to initialize repository object
     * @param NewsListRepository $newslist;
     */
    public function __construct(NewsListRepository $newslist)
    {
        $this->newslist = $newslist;
    }

    /**
     * This method return the data of the model
     * @param ManageNewsListRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNewsListRequest $request)
    {
        return Datatables::of($this->newslist->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($newslist) {
                return Carbon::parse($newslist->created_at)->toDateString();
            })
            ->addColumn('actions', function ($newslist) {
                return $newslist->action_buttons;
            })
            ->make(true);
    }
}
