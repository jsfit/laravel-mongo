<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Console\Command;

class FakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Truncating...\n";
        Project::truncate();
        Team::truncate();
        $team = Team::create();

        echo "Preparing\n";

        $milion = 1;
        $loop = $milion * 1000000;
        $data = [];
        ini_set('memory_limit', '-1');
        $data = array();

        for ($i = 0; $i < $loop; $i++) {
            array_push($data, ['name' => 'Test' . $i, 'team_id'=> $team->_id]);
        }
        echo "Inserting...\n";
        Project::insert($data);
        echo "Completed\n";
    }
}
