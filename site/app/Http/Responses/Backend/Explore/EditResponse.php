<?php

namespace App\Http\Responses\Backend\Explore;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Explore\Explore
     */
    protected $explores;

    /**
     * @param App\Models\Explore\Explore $explores
     */
    public function __construct($explores)
    {
        $this->explores = $explores;
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
        return view('backend.explores.edit')->with([
            'explores' => $this->explores
        ]);
    }
}