<?php

namespace App\Jobs;

use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userTarget;

    /**
     * Create a new job instance.
     */
    public function __construct($userTarget)
    {
        // dd($userTarget);
        $this->userTarget = $userTarget;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [
            'name' => 'User Test aja',
            'body' => 'Testing Kirim OK'
        ];
        $email = new SendEmailTest($data);
        Mail::to($this->userTarget)->send($email);
    }
}
