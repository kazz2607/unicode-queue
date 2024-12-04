<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('inspire')->everyMinute()->appendOutputTo('inspire.txt');
        $schedule->call(function(){
            $user = new User();
            $user->name = 'Nguyễn Tuấn '.rand(1,100);
            $user->email = 'email-'.rand(1,100).'@gmail.com';
            $user->password = Hash::make('123456');
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
        })->everyFiveSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
