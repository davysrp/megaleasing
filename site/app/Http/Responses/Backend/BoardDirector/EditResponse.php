<?php

namespace App\Http\Responses\Backend\BoardDirector;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\BoardDirector\BoardDirector
     */
    protected $boarddirectors;

    /**
     * @param App\Models\BoardDirector\BoardDirector $boarddirectors
     */
    public function __construct($boarddirectors)
    {
        $this->boarddirectors = $boarddirectors;
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
        return view('backend.boarddirectors.edit')->with([
            'boarddirectors' => $this->boarddirectors
        ]);
    }
}