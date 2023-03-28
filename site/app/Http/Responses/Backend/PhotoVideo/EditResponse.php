<?php

namespace App\Http\Responses\Backend\PhotoVideo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PhotoVideo\PhotoVideo
     */
    protected $photovideos;

    /**
     * @param App\Models\PhotoVideo\PhotoVideo $photovideos
     */
    public function __construct($photovideos)
    {
        $this->photovideos = $photovideos;
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
        return view('backend.photovideos.edit')->with([
            'photovideos' => $this->photovideos
        ]);
    }
}