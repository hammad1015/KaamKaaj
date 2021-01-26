<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;

class BroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, $content)
    {
        $this->event   = $event;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('broadcast');
    }
}
