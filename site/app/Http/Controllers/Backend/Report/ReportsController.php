<?php

namespace App\Http\Controllers\Backend\Report;

use App\Models\Report\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Report\CreateResponse;
use App\Http\Responses\Backend\Report\EditResponse;
use App\Repositories\Backend\Report\ReportRepository;
use App\Http\Requests\Backend\Report\ManageReportRequest;
use App\Http\Requests\Backend\Report\CreateReportRequest;
use App\Http\Requests\Backend\Report\StoreReportRequest;
use App\Http\Requests\Backend\Report\EditReportRequest;
use App\Http\Requests\Backend\Report\UpdateReportRequest;
use App\Http\Requests\Backend\Report\DeleteReportRequest;

/**
 * ReportsController
 */
class ReportsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReportRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ReportRepository $repository;
     */
    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Report\ManageReportRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageReportRequest $request)
    {
        return new ViewResponse('backend.reports.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateReportRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Report\CreateResponse
     */
    public function create(CreateReportRequest $request)
    {
        return new CreateResponse('backend.reports.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReportRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreReportRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.reports.index'), ['flash_success' => trans('alerts.backend.reports.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Report\Report  $report
     * @param  EditReportRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Report\EditResponse
     */
    public function edit(Report $report, EditReportRequest $request)
    {
        return new EditResponse($report);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateReportRequestNamespace  $request
     * @param  App\Models\Report\Report  $report
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $report, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.reports.index'), ['flash_success' => trans('alerts.backend.reports.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteReportRequestNamespace  $request
     * @param  App\Models\Report\Report  $report
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Report $report, DeleteReportRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($report);
        //returning with successfull message
        return new RedirectResponse(route('admin.reports.index'), ['flash_success' => trans('alerts.backend.reports.deleted')]);
    }
    
}
