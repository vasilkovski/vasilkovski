<?php

namespace App\Console\Commands;

use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteVehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all deleted vehicles';

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
     * @return int
     */
    public function handle()
    {
      
        $vehicles = Vehicle::withTrashed()->where('deleted_at', '!=', null)->get();
        $bar = $this->output->createProgressBar(count($vehicles));

        $bar->start();


        foreach($vehicles as $key => $vehicle){
            $vehicle->forceDelete();
            $bar->advance();
        }
        $bar->finish();
    }
}
