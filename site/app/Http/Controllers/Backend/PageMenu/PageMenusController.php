<?php

namespace App\Http\Controllers\Backend\PageMenu;

use App\Models\PageMenu\PageMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\PageMenu\CreateResponse;
use App\Http\Responses\Backend\PageMenu\EditResponse;
use App\Repositories\Backend\PageMenu\PageMenuRepository;
use App\Http\Requests\Backend\PageMenu\ManagePageMenuRequest;
use App\Http\Requests\Backend\PageMenu\CreatePageMenuRequest;
use App\Http\Requests\Backend\PageMenu\StorePageMenuRequest;
use App\Http\Requests\Backend\PageMenu\EditPageMenuRequest;
use App\Http\Requests\Backend\PageMenu\UpdatePageMenuRequest;
use App\Http\Requests\Backend\PageMenu\DeletePageMenuRequest;

/**
 * PageMenusController
 */
class PageMenusController extends Controller
{
    /**
     * variable to store the repository object
     * @var PageMenuRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PageMenuRepository $repository;
     */
    public function __construct(PageMenuRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PageMenu\ManagePageMenuRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePageMenuRequest $request)
    {
        return new ViewResponse('backend.pagemenus.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePageMenuRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PageMenu\CreateResponse
     */
    public function create(CreatePageMenuRequest $request)
    {
        return new CreateResponse('backend.pagemenus.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePageMenuRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePageMenuRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.pagemenus.index'), ['flash_success' => trans('alerts.backend.pagemenus.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PageMenu\PageMenu  $pagemenu
     * @param  EditPageMenuRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PageMenu\EditResponse
     */
    public function edit(PageMenu $pagemenu, EditPageMenuRequest $request)
    {
        return new EditResponse($pagemenu);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePageMenuRequestNamespace  $request
     * @param  App\Models\PageMenu\PageMenu  $pagemenu
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePageMenuRequest $request, PageMenu $pagemenu)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $pagemenu, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.pagemenus.index'), ['flash_success' => trans('alerts.backend.pagemenus.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePageMenuRequestNamespace  $request
     * @param  App\Models\PageMenu\PageMenu  $pagemenu
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(PageMenu $pagemenu, DeletePageMenuRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($pagemenu);
        //returning with successfull message
        return new RedirectResponse(route('admin.pagemenus.index'), ['flash_success' => trans('alerts.backend.pagemenus.deleted')]);
    }
    
}
