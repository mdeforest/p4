<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Search;
use function PHPSTORM_META\type;

class RunSearches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:searches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run search tasks that need to be run';

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
        $searches = Search::with('platform', 'criteria')->get();
        $now = strtotime(Carbon::now()->toDateTimeString());

        foreach($searches as $search) {
            $next_run = strtotime("+" . $search->frequency_value . " minutes", strtotime($search->last_run));

            if($now > $next_run) {
                run_search($search);

                $search->last_run = $now;
            }
        }
    }
}
