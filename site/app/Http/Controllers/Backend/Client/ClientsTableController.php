<?php

namespace App\Http\Controllers\Backend\Client;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Client\ClientRepository;
use App\Http\Requests\Backend\Client\ManageClientRequest;

/**
 * Class ClientsTableController.
 */
class ClientsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ClientRepository
     */
    protected $client;

    /**
     * contructor to initialize repository object
     * @param ClientRepository $client;
     */
    public function __construct(ClientRepository $client)
    {
        $this->client = $client;
    }

    /**
     * This method return the data of the model
     * @param ManageClientRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageClientRequest $request)
    {
        return Datatables::of($this->client->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($client) {
                return Carbon::parse($client->created_at)->toDateString();
            })
            ->addColumn('actions', function ($client) {
                return $client->action_buttons;
            })
            ->make(true);
    }
}
