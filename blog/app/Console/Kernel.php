<?php

namespace App\Console;

use App\Http\Controllers\UserController;
use App\Jobs\ProcessPodcast;
use App\Repositories\UserRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
//        $schedule->call(function () {
//            DB::table('users')->update(['active' => NOT_ACTIVE]);
//        })->everyMinute();
//        $schedule->call(new UserRepository)->everyMinute();

//        $schedule->command('php artisan migrate')->everyMinute();

//        $schedule->job(new ProcessPodcast)->everyMinute();

//        $schedule->exec('node /home/forge/script.js')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
