<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\NotificationCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $dateTimeArray = Notification::get()->pluck('datetime')->toArray();
        foreach($dateTimeArray as $datetime){
            $convert = \Carbon\Carbon::parse($datetime);
            $year = $convert->format('Y');
            $date = $convert->format('d');
            $month = $convert->format('m');
            $hour = $convert->format('H');
            $min = (int)$convert->format('i');
            
            
        }
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
