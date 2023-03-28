<?php

namespace App\Http\Responses\Backend\Job;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Job\Job
     */
    protected $jobs;

    /**
     * @param App\Models\Job\Job $jobs
     */
    public function __construct($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.jobs.edit')->with([
            'jobs' => $this->jobs
        ]);
    }
}