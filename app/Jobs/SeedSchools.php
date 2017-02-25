<?php

namespace App\Jobs;

use DB;
use Illuminate\Database\Seeder;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class SeedSchools implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
       Artisan::call('db:seed', [
      '--class'   => 'SchoolTable',
      '--force'   => true
]);

       Artisan::call('db:seed', [
      '--class'   => 'CngTable',
      '--force'   => true
]);
       
    }
}
