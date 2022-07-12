<?php

namespace App\Mail;

use App\Models\Commande;
use App\Models\AdresseClient;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommandeMail extends Mailable
{
    use Queueable, SerializesModels;
    public  $clt, $commande;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AdresseClient $clt , Commande $commande)
    {
        $this->clt = $clt;
        $this->commande = $commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lmonsia@technodatasolutions.bj')
                    ->subject('Commande passée')
                    ->markdown('mails.commandemail')
                    ->with('clt', 'commande', $this->clt, $this->commande);

    }
}
