<?php

namespace App\Http\Responses\Backend\Province;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Province\Province
     */
    protected $provinces;

    /**
     * @param App\Models\Province\Province $provinces
     */
    public function __construct($provinces)
    {
        $this->provinces = $provinces;
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
        return view('backend.provinces.edit')->with([
            'provinces' => $this->provinces
        ]);
    }
}