<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuiEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $hoten="";
    public $email="";
    public $noidung="";
    /**
     * Create a new message instance.
     */
    public function __construct($ht, $em, $nd)
    {
        $this->hoten = $ht;
        $this->email = $em;
        $this->noidung = $nd;
    }

    public function build()
    {
        return $this->view('viewMailLienHe');
    }
}
