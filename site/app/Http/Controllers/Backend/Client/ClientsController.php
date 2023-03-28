<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Client\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Client\CreateResponse;
use App\Http\Responses\Backend\Client\EditResponse;
use App\Repositories\Backend\Client\ClientRepository;
use App\Http\Requests\Backend\Client\ManageClientRequest;
use App\Http\Requests\Backend\Client\CreateClientRequest;
use App\Http\Requests\Backend\Client\StoreClientRequest;
use App\Http\Requests\Backend\Client\EditClientRequest;
use App\Http\Requests\Backend\Client\UpdateClientRequest;
use App\Http\Requests\Backend\Client\DeleteClientRequest;

/**
 * ClientsController
 */
class ClientsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ClientRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ClientRepository $repository;
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Client\ManageClientRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageClientRequest $request)
    {
        return new ViewResponse('backend.clients.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateClientRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Client\CreateResponse
     */
    public function create(CreateClientRequest $request)
    {
        return new CreateResponse('backend.clients.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreClientRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreClientRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.clients.index'), ['flash_success' => trans('alerts.backend.clients.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Client\Client  $client
     * @param  EditClientRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Client\EditResponse
     */
    public function edit(Client $client, EditClientRequest $request)
    {
        return new EditResponse($client);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateClientRequestNamespace  $request
     * @param  App\Models\Client\Client  $client
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $client, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.clients.index'), ['flash_success' => trans('alerts.backend.clients.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteClientRequestNamespace  $request
     * @param  App\Models\Client\Client  $client
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Client $client, DeleteClientRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($client);
        //returning with successfull message
        return new RedirectResponse(route('admin.clients.index'), ['flash_success' => trans('alerts.backend.clients.deleted')]);
    }
    
}
