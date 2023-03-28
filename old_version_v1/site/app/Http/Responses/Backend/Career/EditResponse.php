<?php

namespace App\Http\Responses\Backend\Career;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Career\Career
     */
    protected $careers;

    /**
     * @param App\Models\Career\Career $careers
     */
    public function __construct($careers)
    {
        $this->careers = $careers;
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
        return view('backend.careers.edit')->with([
            'careers' => $this->careers
        ]);
    }
}