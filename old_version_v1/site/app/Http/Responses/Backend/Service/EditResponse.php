<?php

namespace App\Http\Responses\Backend\Service;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Service\Service
     */
    protected $services;

    /**
     * @param App\Models\Service\Service $services
     */
    public function __construct($services)
    {
        $this->services = $services;
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
        return view('backend.services.edit')->with([
            'services' => $this->services
        ]);
    }
}