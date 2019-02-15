<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LigeController;
use Illuminate\Console\Command;

class CallLoadLigeNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lige:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command load all liges';

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
        $controller=new LigeController();
        $controller->loadLigeNames();
    }
}
