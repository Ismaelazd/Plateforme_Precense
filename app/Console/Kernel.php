<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Event;
use Carbon\Carbon;

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
        // $schedule->command('absenceAuto')->weekdays()->hourly()->when(function () {
        //     return date('H') >= 8 && date('H') <= 17;
        // });
        // $schedule->command('absenceAuto')->everyFiveMinutes()->when(function () use ($dateInDatabase) {
        //     return (

        //         Event::where('end', new DateTime::format('Y-m-y H-i'))
        //         $dateInDatabase == Carbon::today() ||
        //         $dateInDatabase == Carbon::yesterday() ||
        //         $dateInDatabase == Carbon::subDays(2)
        //     );
        // });
        // $schedule->call(function () {
        //     $events = Event::where('end', '=', Carbon::now('Y-m-d'))->where('end', '<', Carbon::now())->get();
        //     $events->

        // })->hourly();
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
