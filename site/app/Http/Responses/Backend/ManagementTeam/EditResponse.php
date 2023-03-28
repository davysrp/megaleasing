<?php

namespace App\Http\Responses\Backend\ManagementTeam;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ManagementTeam\ManagementTeam
     */
    protected $managementteams;

    /**
     * @param App\Models\ManagementTeam\ManagementTeam $managementteams
     */
    public function __construct($managementteams)
    {
        $this->managementteams = $managementteams;
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
        return view('backend.managementteams.edit')->with([
            'managementteams' => $this->managementteams
        ]);
    }
}