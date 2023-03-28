<?php

namespace App\Http\Responses\Backend\AboutUs;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\AboutUs\AboutU
     */
    protected $aboutus;

    /**
     * @param App\Models\AboutUs\AboutU $aboutus
     */
    public function __construct($aboutus)
    {
        $this->aboutus = $aboutus;
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
        return view('backend.aboutus.edit')->with([
            'aboutus' => $this->aboutus
        ]);
    }
}