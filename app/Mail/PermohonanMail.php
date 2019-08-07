<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PermohonanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrow, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($borrow, $url)
    {
        $this->borrow = $borrow;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Untuk Tindakan: Permohonan Pinjaman Baru')->markdown('email.borrow.permohonan');
    }
}
