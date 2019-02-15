<?php

namespace App\Console\Commands;

use App\Http\Controllers\LigeController;
use App\Http\Controllers\RezultatiController;
use Illuminate\Console\Command;

class CallFinishRezultatiController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:finish';

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
        $controller=new RezultatiController();
        $controller->loadFinishResults();
    }
}
