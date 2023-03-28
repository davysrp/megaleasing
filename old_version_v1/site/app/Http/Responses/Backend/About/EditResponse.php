<?php

namespace App\Http\Responses\Backend\About;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\About\About
     */
    protected $abouts;

    /**
     * @param App\Models\About\About $abouts
     */
    public function __construct($abouts)
    {
        $this->abouts = $abouts;
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
        return view('backend.abouts.edit')->with([
            'abouts' => $this->abouts
        ]);
    }
}