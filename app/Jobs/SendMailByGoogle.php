<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailByGoogle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $mail;
    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $mail, $data)
    {
        $this->email = $email;
        $this->mail = $mail;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email)->send($this->$mail($this->data));
            $this->fail();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
