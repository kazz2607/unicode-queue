<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        // dd($user);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->user->email;
        $name = $this->user->name;
        $messageBody = 'Chào bạn '.$name.' đã đăng ký thành công';

        Mail::html($messageBody, function ($message) use ($messageBody, $email) {
            $message->to($email);
            $message->subject('Đăng ký thành viên thành công');
            $message->html($messageBody);
        });
    }
}
