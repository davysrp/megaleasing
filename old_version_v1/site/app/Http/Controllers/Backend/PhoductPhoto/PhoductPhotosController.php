<?php

namespace App\Http\Controllers\Backend\PhoductPhoto;

use App\Models\PhoductPhoto\PhoductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\PhoductPhoto\CreateResponse;
use App\Http\Responses\Backend\PhoductPhoto\EditResponse;
use App\Repositories\Backend\PhoductPhoto\PhoductPhotoRepository;
use App\Http\Requests\Backend\PhoductPhoto\ManagePhoductPhotoRequest;
use App\Http\Requests\Backend\PhoductPhoto\CreatePhoductPhotoRequest;
use App\Http\Requests\Backend\PhoductPhoto\StorePhoductPhotoRequest;
use App\Http\Requests\Backend\PhoductPhoto\EditPhoductPhotoRequest;
use App\Http\Requests\Backend\PhoductPhoto\UpdatePhoductPhotoRequest;
use App\Http\Requests\Backend\PhoductPhoto\DeletePhoductPhotoRequest;

/**
 * PhoductPhotosController
 */
class PhoductPhotosController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhoductPhotoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PhoductPhotoRepository $repository;
     */
    public function __construct(PhoductPhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PhoductPhoto\ManagePhoductPhotoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePhoductPhotoRequest $request)
    {
        return new ViewResponse('backend.phoductphotos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePhoductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhoductPhoto\CreateResponse
     */
    public function create(CreatePhoductPhotoRequest $request)
    {
        return new CreateResponse('backend.phoductphotos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePhoductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePhoductPhotoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.phoductphotos.index'), ['flash_success' => trans('alerts.backend.phoductphotos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PhoductPhoto\PhoductPhoto  $phoductphoto
     * @param  EditPhoductPhotoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhoductPhoto\EditResponse
     */
    public function edit(PhoductPhoto $phoductphoto, EditPhoductPhotoRequest $request)
    {
        return new EditResponse($phoductphoto);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePhoductPhotoRequestNamespace  $request
     * @param  App\Models\PhoductPhoto\PhoductPhoto  $phoductphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePhoductPhotoRequest $request, PhoductPhoto $phoductphoto)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $phoductphoto, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.phoductphotos.index'), ['flash_success' => trans('alerts.backend.phoductphotos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePhoductPhotoRequestNamespace  $request
     * @param  App\Models\PhoductPhoto\PhoductPhoto  $phoductphoto
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(PhoductPhoto $phoductphoto, DeletePhoductPhotoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($phoductphoto);
        //returning with successfull message
        return new RedirectResponse(route('admin.phoductphotos.index'), ['flash_success' => trans('alerts.backend.phoductphotos.deleted')]);
    }
    
}
