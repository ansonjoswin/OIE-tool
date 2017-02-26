<?php

namespace App\Console;

USE DB;
use Illuminate\Database\Seeder;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use \Auth;
use App\user;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
     if(File::isDirectory(storage_path('app\uploads'))){

              $file=storage_path('logs\Scheduerlog.log');
           
         
             $schedule->command('queue:work --queue=database-high,database-low')
                      ->hourlyAT('33')
                   // ->dailyAT('01:00')
                      ->sendOutputTo($file);
                   /*   ->emailOutputTo('oie.team2017@gmail.com')   
                      ->after( function () {
                        Storage::deletedirectory('uploads');
                      });*/
               
    }
    }   

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
