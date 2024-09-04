<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order; // Import your Order model here

class OrderPlacedEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $data;
    
    public function __construct($user, $data)
    {
        $this->user = $user;
        $this->order = $data;
    }
    
    public function build()
    {
        return $this->subject('Order Placed')
            ->view('mail.send-mail-order');
    }
}
