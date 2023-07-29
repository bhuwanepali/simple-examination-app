<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $email;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function build()
    {
        $id = $this->id;
        $email = $this->email;
        return $this->from('bhuwanepali77@gmail.com', 'Bhuwan Pariyar')
            ->subject('Welcome to Our Online Examination Site')
            ->view('emails.QuestionPage', compact('id', 'email'));
    }
}