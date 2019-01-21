<?php

namespace App\Console\Commands;

use App\Promotion;
use Illuminate\Console\Command;


class checkDatePromotion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:datepromotion';

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
        Promotion::where('end_date_sale','<',date("Y-m-d H:i:s"))->update(['enable'=>0]);
        // \Log::info("da check");
    }
}
