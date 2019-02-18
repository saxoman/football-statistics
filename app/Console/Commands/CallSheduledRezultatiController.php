<?php

namespace App\Console\Commands;

use App\Http\Controllers\RezultatiController;
use App\Http\Controllers\SheduledController;
use Illuminate\Console\Command;

class CallSheduledRezultatiController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:sheduled';

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
        $controller=new SheduledController();
        $controller->loadSheduledResults();
    }
}
