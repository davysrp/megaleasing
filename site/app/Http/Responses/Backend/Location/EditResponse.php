<?php

namespace App\Http\Responses\Backend\Location;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Location\Location
     */
    protected $locations;

    /**
     * @param App\Models\Location\Location $locations
     */
    public function __construct($locations)
    {
        $this->locations = $locations;
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
        return view('backend.locations.edit')->with([
            'locations' => $this->locations
        ]);
    }
}