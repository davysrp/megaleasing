<?php

namespace App\Http\Controllers\Backend\Media;

use App\Models\Media\Medium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Media\CreateResponse;
use App\Http\Responses\Backend\Media\EditResponse;
use App\Repositories\Backend\Media\MediumRepository;
use App\Http\Requests\Backend\Media\ManageMediumRequest;

/**
 * MediaController
 */
class MediaController extends Controller
{
    /**
     * variable to store the repository object
     * @var MediumRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param MediumRepository $repository;
     */
    public function __construct(MediumRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Media\ManageMediumRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageMediumRequest $request)
    {
        return new ViewResponse('backend.medias.index');
    }
    
}
