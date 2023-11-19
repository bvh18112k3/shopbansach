<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $order;
    private $order_dettail;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Order $order,  $order_detail)
    {
        $this->user = $user;
        $this->order = $order;
        $this->order_dettail = $order_detail;

    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        
        return $this->subject('Thông tin đơn hàng')
            ->view('mail.mail')
            ->with([
                'user'=>$this->user,
                'order'=>$this->order,
                'order_detail'=>$this->order_dettail
            ]);

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
