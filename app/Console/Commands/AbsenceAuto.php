<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AbsenceAuto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:absenceauto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $schedule->command('do:thing')->weekdays()->hourly()->when(function () {
        //     return date('H') >= 8 && date('H') <= 17;
        // });
        // echo("salut \n");
    }
}
