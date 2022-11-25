<?php

namespace App\Providers;

use App\Providers\TshirtCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailMessageWhenTshirtCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\TshirtCreated  $event
     * @return void
     */
    public function handle(TshirtCreated $event)
    {
        //Mail::to('exemplemail@mail.com')->send(new \App\Mail\TshirtCreated($event->tshirt));
        return view('index');
    }
}
