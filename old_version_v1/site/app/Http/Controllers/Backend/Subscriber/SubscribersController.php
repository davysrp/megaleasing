<?php

namespace App\Http\Controllers\Backend\Subscriber;

use App\Models\Subscriber\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Subscriber\CreateResponse;
use App\Http\Responses\Backend\Subscriber\EditResponse;
use App\Repositories\Backend\Subscriber\SubscriberRepository;
use App\Http\Requests\Backend\Subscriber\ManageSubscriberRequest;
use App\Http\Requests\Backend\Subscriber\CreateSubscriberRequest;
use App\Http\Requests\Backend\Subscriber\StoreSubscriberRequest;
use App\Http\Requests\Backend\Subscriber\EditSubscriberRequest;
use App\Http\Requests\Backend\Subscriber\UpdateSubscriberRequest;
use App\Http\Requests\Backend\Subscriber\DeleteSubscriberRequest;

/**
 * SubscribersController
 */
class SubscribersController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubscriberRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SubscriberRepository $repository;
     */
    public function __construct(SubscriberRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Subscriber\ManageSubscriberRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSubscriberRequest $request)
    {
        return new ViewResponse('backend.subscribers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSubscriberRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subscriber\CreateResponse
     */
    public function create(CreateSubscriberRequest $request)
    {
        return new CreateResponse('backend.subscribers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubscriberRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSubscriberRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.subscribers.index'), ['flash_success' => trans('alerts.backend.subscribers.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Subscriber\Subscriber  $subscriber
     * @param  EditSubscriberRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subscriber\EditResponse
     */
    public function edit(Subscriber $subscriber, EditSubscriberRequest $request)
    {
        return new EditResponse($subscriber);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubscriberRequestNamespace  $request
     * @param  App\Models\Subscriber\Subscriber  $subscriber
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $subscriber, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.subscribers.index'), ['flash_success' => trans('alerts.backend.subscribers.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSubscriberRequestNamespace  $request
     * @param  App\Models\Subscriber\Subscriber  $subscriber
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Subscriber $subscriber, DeleteSubscriberRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($subscriber);
        //returning with successfull message
        return new RedirectResponse(route('admin.subscribers.index'), ['flash_success' => trans('alerts.backend.subscribers.deleted')]);
    }
    
}
