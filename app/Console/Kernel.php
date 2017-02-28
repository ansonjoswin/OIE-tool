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
use Illuminate\Support\Facades\log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

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

              $file=storage_path('logs\scheduler\Scheduerlog1.log');

           // $ab=storage_path('logs\scheduler\Scheduerlog1.log');
              $view_log = new Logger('schedulerlogs');
              $view_log->pushHandler(new StreamHandler(storage_path('logs\Scheduerlog.log'), Logger::INFO));
             //  $ab=File::get($file);
            //  $view_log->addInfo('hello');
              //$view_log->addInfo("User $user clicked");
         
             $schedule->command('queue:work --queue=database-high,database-low')
                      //->hourlyAT('37')
                      ->dailyAT('01:00')
                      ->appendOutputTo($file)
                     // ->emailOutputTo('oie.team2017@gmail.com')   
                      ->after( function () {
                        Storage::deletedirectory('uploads');
                        //$ab=File::get($file);
                      });

                     //$ab=File::get($file);
                    
                   $temp = '';
                      $handle = fopen($file, "r");
        if ($handle) {
                 while (! feof($handle)) {
                 $line = stripslashes(fgets($handle)); 
                 //echo $line;
                 //$t = str_replace("?[32m", "", $line);
                 //$view_log->addINFO($line);
                 //$t=preg_replace('/[[32m[39m[37;41m]/','',$line);
                
               //  var_dump(substr($temp,1,3));
              //   if(substr($temp,1,4) === "[32m"){
$line = substr_replace($line,'',((strpos($line, '[32m'))-1),5);
$line = substr_replace($line,'',((strpos($line, '[39m'))-1),5);
$line = substr_replace($line,'',((strpos($line, '[37;41m'))-1),8);
$line = substr_replace($line,'',((strpos($line, '[39;49m'))-1),8);
$temp = $temp.$line;

//var_dump($temp);<br>
               //}
                 //var_dump($t);
                }
              fclose($handle);
          }
                          
              $view_log->addINFO($temp);
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
