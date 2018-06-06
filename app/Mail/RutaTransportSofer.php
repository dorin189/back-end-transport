<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RutaTransportSofer extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var string
     */
    private $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $link)
    {

        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@transportator.ro')
                    ->view('ruta',['link'=> $this->link]);
    }
}
