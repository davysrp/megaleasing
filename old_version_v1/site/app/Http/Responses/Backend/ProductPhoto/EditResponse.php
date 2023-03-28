<?php

namespace App\Http\Responses\Backend\ProductPhoto;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ProductPhoto\ProductPhoto
     */
    protected $productphotos;

    /**
     * @param App\Models\ProductPhoto\ProductPhoto $productphotos
     */
    public function __construct($productphotos)
    {
        $this->productphotos = $productphotos;
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
        return view('backend.productphotos.edit')->with([
            'productphotos' => $this->productphotos
        ]);
    }
}