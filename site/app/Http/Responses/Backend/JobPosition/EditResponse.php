<?php

namespace App\Http\Responses\Backend\JobPosition;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\JobPosition\JobPosition
     */
    protected $jobpositions;

    /**
     * @param App\Models\JobPosition\JobPosition $jobpositions
     */
    public function __construct($jobpositions)
    {
        $this->jobpositions = $jobpositions;
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
        return view('backend.jobpositions.edit')->with([
            'jobpositions' => $this->jobpositions
        ]);
    }
}