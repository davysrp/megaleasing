<?php

namespace App\Http\Responses\Backend\PhoductPhoto;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PhoductPhoto\PhoductPhoto
     */
    protected $phoductphotos;

    /**
     * @param App\Models\PhoductPhoto\PhoductPhoto $phoductphotos
     */
    public function __construct($phoductphotos)
    {
        $this->phoductphotos = $phoductphotos;
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
        return view('backend.phoductphotos.edit')->with([
            'phoductphotos' => $this->phoductphotos
        ]);
    }
}