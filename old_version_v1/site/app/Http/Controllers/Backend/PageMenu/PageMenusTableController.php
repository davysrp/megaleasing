<?php

namespace App\Http\Controllers\Backend\PageMenu;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PageMenu\PageMenuRepository;
use App\Http\Requests\Backend\PageMenu\ManagePageMenuRequest;

/**
 * Class PageMenusTableController.
 */
class PageMenusTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PageMenuRepository
     */
    protected $pagemenu;

    /**
     * contructor to initialize repository object
     * @param PageMenuRepository $pagemenu;
     */
    public function __construct(PageMenuRepository $pagemenu)
    {
        $this->pagemenu = $pagemenu;
    }

    /**
     * This method return the data of the model
     * @param ManagePageMenuRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePageMenuRequest $request)
    {
        return Datatables::of($this->pagemenu->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($pagemenu) {
                return Carbon::parse($pagemenu->created_at)->toDateString();
            })
            ->addColumn('actions', function ($pagemenu) {
                return $pagemenu->action_buttons;
            })
            ->make(true);
    }
}
