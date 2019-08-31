<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WallpaperApproved extends Mailable
{
    use Queueable, SerializesModels;

    protected $wallpaper;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($wallpaper)
    {
        $this->wallpaper = $wallpaper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your wallpaper has been approved!')
                    ->view('emails.approved')
                    ->with([
                        'wallpaper' => $this->wallpaper,
                    ]);
    }
}
