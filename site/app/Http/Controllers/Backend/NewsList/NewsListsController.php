<?php

namespace App\Http\Controllers\Backend\NewsList;

use App\Models\NewsList\NewsList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\NewsList\CreateResponse;
use App\Http\Responses\Backend\NewsList\EditResponse;
use App\Repositories\Backend\NewsList\NewsListRepository;
use App\Http\Requests\Backend\NewsList\ManageNewsListRequest;
use App\Http\Requests\Backend\NewsList\CreateNewsListRequest;
use App\Http\Requests\Backend\NewsList\StoreNewsListRequest;
use App\Http\Requests\Backend\NewsList\EditNewsListRequest;
use App\Http\Requests\Backend\NewsList\UpdateNewsListRequest;
use App\Http\Requests\Backend\NewsList\DeleteNewsListRequest;

/**
 * NewsListsController
 */
class NewsListsController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewsListRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param NewsListRepository $repository;
     */
    public function __construct(NewsListRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\NewsList\ManageNewsListRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageNewsListRequest $request)
    {
        return new ViewResponse('backend.newslists.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateNewsListRequestNamespace  $request
     * @return \App\Http\Responses\Backend\NewsList\CreateResponse
     */
    public function create(CreateNewsListRequest $request)
    {
        return new CreateResponse('backend.newslists.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsListRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreNewsListRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.newslists.index'), ['flash_success' => trans('alerts.backend.newslists.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\NewsList\NewsList  $newslist
     * @param  EditNewsListRequestNamespace  $request
     * @return \App\Http\Responses\Backend\NewsList\EditResponse
     */
    public function edit(NewsList $newslist, EditNewsListRequest $request)
    {
        return new EditResponse($newslist);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewsListRequestNamespace  $request
     * @param  App\Models\NewsList\NewsList  $newslist
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateNewsListRequest $request, NewsList $newslist)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $newslist, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.newslists.index'), ['flash_success' => trans('alerts.backend.newslists.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteNewsListRequestNamespace  $request
     * @param  App\Models\NewsList\NewsList  $newslist
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(NewsList $newslist, DeleteNewsListRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($newslist);
        //returning with successfull message
        return new RedirectResponse(route('admin.newslists.index'), ['flash_success' => trans('alerts.backend.newslists.deleted')]);
    }
    
}
