<?php

namespace App\Http\Controllers\Backend\Subscriber;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Subscriber\SubscriberRepository;
use App\Http\Requests\Backend\Subscriber\ManageSubscriberRequest;

/**
 * Class SubscribersTableController.
 */
class SubscribersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubscriberRepository
     */
    protected $subscriber;

    /**
     * contructor to initialize repository object
     * @param SubscriberRepository $subscriber;
     */
    public function __construct(SubscriberRepository $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * This method return the data of the model
     * @param ManageSubscriberRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSubscriberRequest $request)
    {
        return Datatables::of($this->subscriber->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($subscriber) {
                return Carbon::parse($subscriber->created_at)->toDateString();
            })
            ->addColumn('actions', function ($subscriber) {
                return $subscriber->action_buttons;
            })
            ->make(true);
    }
}
