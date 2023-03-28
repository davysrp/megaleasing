<?php

namespace App\Http\Responses\Backend\ECommerce;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ECommerce\ECommerce
     */
    protected $ecommerces;

    /**
     * @param App\Models\ECommerce\ECommerce $ecommerces
     */
    public function __construct($ecommerces)
    {
        $this->ecommerces = $ecommerces;
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
        return view('backend.ecommerces.edit')->with([
            'ecommerces' => $this->ecommerces
        ]);
    }
}