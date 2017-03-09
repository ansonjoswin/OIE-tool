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

               $scheduler_dir = __DIR__ . '/../..\storage\logs\scheduler';

            if (!file_exists($scheduler_dir)) {
                mkdir($scheduler_dir, 0777, true);
            }

              $file=storage_path('logs\scheduler\Scheduerlogdefault.log');

           // $ab=storage_path('logs\scheduler\Scheduerlog1.log');
              $view_log = new Logger('schedulerlogs');
              $view_log->pushHandler(new StreamHandler(storage_path('logs\Scheduerlog.log'), Logger::INFO));
             //  $ab=File::get($file);
            //  $view_log->addInfo('hello');
              //$view_log->addInfo("User $user clicked");
         
             $schedule->command('queue:work --queue=database-high,database-low')
                      //->hourlyAT('09')
                      ->dailyAT('01:00')
                      ->appendOutputTo($file)
                     ->after( function () {
                        Storage::deletedirectory('uploads');       
                        DB::Table('map_tables')->truncate();                
                      });

                     
      if(file::exists($file))
      {              
              $temp = '';
              $handle = fopen($file, "r");
        	  if ($handle) {
                 while (! feof($handle)) {
                    
                    $line = stripslashes(fgets($handle)); 
                 
					$line = substr_replace($line,'',((strpos($line, '[32m'))-1),5);
					$line = substr_replace($line,'',((strpos($line, '[39m'))-1),5);
					$line = substr_replace($line,'',((strpos($line, '[37;41m'))-1),8);
					$line = substr_replace($line,'',((strpos($line, '[39;49m'))-1),8);
					$temp = $temp.$line;

             }
              
              fclose($handle);
          }
                          
              $view_log->addINFO($temp);
       }
        
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
