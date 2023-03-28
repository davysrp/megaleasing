<?php

namespace App\Http\Controllers\Backend\Slide;

use App\Models\Slide\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Slide\CreateResponse;
use App\Http\Responses\Backend\Slide\EditResponse;
use App\Repositories\Backend\Slide\SlideRepository;
use App\Http\Requests\Backend\Slide\ManageSlideRequest;
use App\Http\Requests\Backend\Slide\CreateSlideRequest;
use App\Http\Requests\Backend\Slide\StoreSlideRequest;
use App\Http\Requests\Backend\Slide\EditSlideRequest;
use App\Http\Requests\Backend\Slide\UpdateSlideRequest;
use App\Http\Requests\Backend\Slide\DeleteSlideRequest;

/**
 * SlidesController
 */
class SlidesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SlideRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SlideRepository $repository;
     */
    public function __construct(SlideRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Slide\ManageSlideRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSlideRequest $request)
    {
        return new ViewResponse('backend.slides.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSlideRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Slide\CreateResponse
     */
    public function create(CreateSlideRequest $request)
    {
        return new CreateResponse('backend.slides.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSlideRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSlideRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.slides.index'), ['flash_success' => trans('alerts.backend.slides.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Slide\Slide  $slide
     * @param  EditSlideRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Slide\EditResponse
     */
    public function edit(Slide $slide, EditSlideRequest $request)
    {
        return new EditResponse($slide);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSlideRequestNamespace  $request
     * @param  App\Models\Slide\Slide  $slide
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $slide, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.slides.index'), ['flash_success' => trans('alerts.backend.slides.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSlideRequestNamespace  $request
     * @param  App\Models\Slide\Slide  $slide
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Slide $slide, DeleteSlideRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($slide);
        //returning with successfull message
        return new RedirectResponse(route('admin.slides.index'), ['flash_success' => trans('alerts.backend.slides.deleted')]);
    }
    
}
