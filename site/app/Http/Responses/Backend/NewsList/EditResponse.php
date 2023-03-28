<?php

namespace App\Http\Responses\Backend\NewsList;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\NewsList\NewsList
     */
    protected $newslists;

    /**
     * @param App\Models\NewsList\NewsList $newslists
     */
    public function __construct($newslists)
    {
        $this->newslists = $newslists;
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
        return view('backend.newslists.edit')->with([
            'newslists' => $this->newslists
        ]);
    }
}