<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterRegisteredMail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewsletterRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsletterRegisteredEvent $event): void
    {
        Mail::to($event->email)->send(new NewsletterRegisteredMail());
    }
}
