<?php

namespace App\Http\Responses\Backend\PageMenu;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PageMenu\PageMenu
     */
    protected $pagemenus;

    /**
     * @param App\Models\PageMenu\PageMenu $pagemenus
     */
    public function __construct($pagemenus)
    {
        $this->pagemenus = $pagemenus;
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
        return view('backend.pagemenus.edit')->with([
            'pagemenus' => $this->pagemenus
        ]);
    }
}