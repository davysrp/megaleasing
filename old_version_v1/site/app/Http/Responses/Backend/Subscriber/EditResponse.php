<?php

namespace App\Http\Responses\Backend\Subscriber;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Subscriber\Subscriber
     */
    protected $subscribers;

    /**
     * @param App\Models\Subscriber\Subscriber $subscribers
     */
    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;
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
        return view('backend.subscribers.edit')->with([
            'subscribers' => $this->subscribers
        ]);
    }
}