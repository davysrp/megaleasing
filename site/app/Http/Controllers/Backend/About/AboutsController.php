<?php

namespace App\Http\Controllers\Backend\About;

use App\Models\About\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\About\CreateResponse;
use App\Http\Responses\Backend\About\EditResponse;
use App\Repositories\Backend\About\AboutRepository;
use App\Http\Requests\Backend\About\ManageAboutRequest;
use App\Http\Requests\Backend\About\CreateAboutRequest;
use App\Http\Requests\Backend\About\StoreAboutRequest;
use App\Http\Requests\Backend\About\EditAboutRequest;
use App\Http\Requests\Backend\About\UpdateAboutRequest;
use App\Http\Requests\Backend\About\DeleteAboutRequest;

/**
 * AboutsController
 */
class AboutsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AboutRepository $repository;
     */
    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\About\ManageAboutRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAboutRequest $request)
    {
        return new ViewResponse('backend.abouts.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAboutRequestNamespace  $request
     * @return \App\Http\Responses\Backend\About\CreateResponse
     */
    public function create(CreateAboutRequest $request)
    {
        return new CreateResponse('backend.abouts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAboutRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAboutRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.abouts.index'), ['flash_success' => trans('alerts.backend.abouts.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\About\About  $about
     * @param  EditAboutRequestNamespace  $request
     * @return \App\Http\Responses\Backend\About\EditResponse
     */
    public function edit(About $about, EditAboutRequest $request)
    {
        return new EditResponse($about);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAboutRequestNamespace  $request
     * @param  App\Models\About\About  $about
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $about, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.abouts.index'), ['flash_success' => trans('alerts.backend.abouts.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAboutRequestNamespace  $request
     * @param  App\Models\About\About  $about
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(About $about, DeleteAboutRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($about);
        //returning with successfull message
        return new RedirectResponse(route('admin.abouts.index'), ['flash_success' => trans('alerts.backend.abouts.deleted')]);
    }
    
}
