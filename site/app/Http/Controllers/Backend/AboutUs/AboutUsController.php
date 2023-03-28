<?php

namespace App\Http\Controllers\Backend\AboutUs;

use App\Models\AboutUs\AboutU;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\AboutUs\CreateResponse;
use App\Http\Responses\Backend\AboutUs\EditResponse;
use App\Repositories\Backend\AboutUs\AboutURepository;
use App\Http\Requests\Backend\AboutUs\ManageAboutURequest;
use App\Http\Requests\Backend\AboutUs\CreateAboutURequest;
use App\Http\Requests\Backend\AboutUs\StoreAboutURequest;
use App\Http\Requests\Backend\AboutUs\EditAboutURequest;
use App\Http\Requests\Backend\AboutUs\UpdateAboutURequest;
use App\Http\Requests\Backend\AboutUs\DeleteAboutURequest;

/**
 * AboutUsController
 */
class AboutUsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AboutURepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AboutURepository $repository;
     */
    public function __construct(AboutURepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\AboutUs\ManageAboutURequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAboutURequest $request)
    {
        return new ViewResponse('backend.aboutus.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAboutURequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutUs\CreateResponse
     */
    public function create(CreateAboutURequest $request)
    {
        return new CreateResponse('backend.aboutus.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAboutURequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAboutURequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.aboutus.index'), ['flash_success' => trans('alerts.backend.aboutus.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\AboutUs\AboutU  $aboutu
     * @param  EditAboutURequestNamespace  $request
     * @return \App\Http\Responses\Backend\AboutUs\EditResponse
     */
    public function edit(AboutU $aboutu, EditAboutURequest $request)
    {
        return new EditResponse($aboutu);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAboutURequestNamespace  $request
     * @param  App\Models\AboutUs\AboutU  $aboutu
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAboutURequest $request, AboutU $aboutu)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $aboutu, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.aboutus.index'), ['flash_success' => trans('alerts.backend.aboutus.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAboutURequestNamespace  $request
     * @param  App\Models\AboutUs\AboutU  $aboutu
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(AboutU $aboutu, DeleteAboutURequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($aboutu);
        //returning with successfull message
        return new RedirectResponse(route('admin.aboutus.index'), ['flash_success' => trans('alerts.backend.aboutus.deleted')]);
    }
    
}
