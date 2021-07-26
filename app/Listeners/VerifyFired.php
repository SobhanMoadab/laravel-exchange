<?php

namespace App\Listeners;

use App\Events\VerifyEmailOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class VerifyFired
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
     * @param  VerifyEmailOrder  $event
     * @return void
     */
    public function handle(VerifyEmailOrder $event)
    {
        Mail::send('User.Mail.verify', $event->data['body'], function ($message) use ($event) {
            $message->to($event->email)
                ->subject('Verify Your Email');
            $message->from('veiledassassin99@gmail.com', 'E-CMS');
        });
    }
}
