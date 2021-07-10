<?php

namespace App\Console\Commands;

use App\Models\Log;
use Illuminate\Console\Command;

class CronJobLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:log {days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete logs if they are older than requested time';

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
       $logs = Log::where('created_at', '<=', \Carbon\Carbon::now()->subDays($this->argument('days'))->toDateTimeString())->delete();
      
    }
}
