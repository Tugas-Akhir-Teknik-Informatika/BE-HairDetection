<?php

namespace App\Mail;

use App\Models\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otpCode;

    public function __construct($otpCode)
    {
        $this->otpCode = $otpCode;
    }

    public function build()
    {
        return $this->subject('Your OTP Code')
                    ->view('otp') // Pastikan sudah membuat view emails.otp
                    ->with([
                        'otpCode' => $this->otpCode,
                    ]);
    }
}
