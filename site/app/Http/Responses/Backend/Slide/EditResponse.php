<?php

namespace App\Http\Responses\Backend\Slide;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Slide\Slide
     */
    protected $slides;

    /**
     * @param App\Models\Slide\Slide $slides
     */
    public function __construct($slides)
    {
        $this->slides = $slides;
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
        return view('backend.slides.edit')->with([
            'slides' => $this->slides
        ]);
    }
}