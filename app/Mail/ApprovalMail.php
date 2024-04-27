<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovalMail extends Mailable
{
    use Queueable, SerializesModels;


    // public string $mailAddress;
    public $user_data;
    public $leave_recodrs;
    public $mail_message;

    public function data_filter($leave_recodrs)
    {
   
        $this->leave_recodrs = DB::table('leaves')->where('user_id', $this->user_data->id)->first();
        return $this->leave_recodrs;
    }

    /**
     * Create a new message instance.
     */
    public function __construct($user_data, $mail_message)
    {
        $this->mail_message  = $mail_message;
        $this->user_data = $user_data;
        $this->leave_recodrs = $this->data_filter($this->user_data);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Approval Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mail.approval-mail')
                    ->with(['user' => $this->user_data, 'leave_records' => $this->leave_recodrs, 'mail_message' => $this->mail_message]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
