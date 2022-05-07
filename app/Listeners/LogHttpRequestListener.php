<?php

namespace App\Listeners;

class LogHttpRequestListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        echo "class = ".get_class($event);
        var_dump($event->request->header('X-log-id')[0]);
        //throw new Exception("fail it");
    }
}
