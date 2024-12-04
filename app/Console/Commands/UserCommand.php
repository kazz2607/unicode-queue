<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command User Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User();
        $user->name = 'Nguyễn Tuấn ' . rand(1, 100);
        $user->email = 'email-' . rand(1, 100) . '@gmail.com';
        $user->password = Hash::make('123456');
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();
        $this->info('Tạo thành viên thành công! '.$user->name);
    }
}
