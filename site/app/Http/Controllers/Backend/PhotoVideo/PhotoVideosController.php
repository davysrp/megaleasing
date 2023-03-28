<?php

namespace App\Http\Controllers\Backend\PhotoVideo;

use App\Models\PhotoVideo\PhotoVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\PhotoVideo\CreateResponse;
use App\Http\Responses\Backend\PhotoVideo\EditResponse;
use App\Repositories\Backend\PhotoVideo\PhotoVideoRepository;
use App\Http\Requests\Backend\PhotoVideo\ManagePhotoVideoRequest;
use App\Http\Requests\Backend\PhotoVideo\CreatePhotoVideoRequest;
use App\Http\Requests\Backend\PhotoVideo\StorePhotoVideoRequest;
use App\Http\Requests\Backend\PhotoVideo\EditPhotoVideoRequest;
use App\Http\Requests\Backend\PhotoVideo\UpdatePhotoVideoRequest;
use App\Http\Requests\Backend\PhotoVideo\DeletePhotoVideoRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * PhotoVideosController
 */
class PhotoVideosController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhotoVideoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PhotoVideoRepository $repository;
     */
    public function __construct(PhotoVideoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PhotoVideo\ManagePhotoVideoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePhotoVideoRequest $request)
    {
        return new ViewResponse('backend.photovideos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePhotoVideoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhotoVideo\CreateResponse
     */
    public function create(CreatePhotoVideoRequest $request)
    {
        return new CreateResponse('backend.photovideos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePhotoVideoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePhotoVideoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
//        return new RedirectResponse(route('admin.photovideos.index'), ['flash_success' => trans('alerts.backend.photovideos.created')]);
        return Redirect::back()->with(['flash_success' => trans('alerts.backend.photovideos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PhotoVideo\PhotoVideo  $photovideo
     * @param  EditPhotoVideoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhotoVideo\EditResponse
     */
    public function edit(PhotoVideo $photovideo, EditPhotoVideoRequest $request)
    {
        return new EditResponse($photovideo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePhotoVideoRequestNamespace  $request
     * @param  App\Models\PhotoVideo\PhotoVideo  $photovideo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePhotoVideoRequest $request, PhotoVideo $photovideo)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $photovideo, $input );
        //return with successfull message
//        return new RedirectResponse(route('admin.photovideos.index'), ['flash_success' => trans('alerts.backend.photovideos.updated')]);
        return Redirect::back()->with(['flash_success' => trans('alerts.backend.photovideos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePhotoVideoRequestNamespace  $request
     * @param  App\Models\PhotoVideo\PhotoVideo  $photovideo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(PhotoVideo $photovideo, DeletePhotoVideoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($photovideo);
        //returning with successfull message
        return new RedirectResponse(route('admin.photovideos.index'), ['flash_success' => trans('alerts.backend.photovideos.deleted')]);
    }
    
}
