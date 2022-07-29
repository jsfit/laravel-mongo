<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Team;
use App\Models\Pivit;
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
        Pivit::truncate();
        $team = Team::create();
        $pivit = Pivit::create();
        $team->pivit_id = $pivit->_id;
        $team->save();

        echo "Preparing...\n";

        $milion = 1;
        $loop = $milion * 100;
        $data = [];
        ini_set('memory_limit', '-1');
        $data = array();

         for ($i = 0; $i < $loop; $i++) {
            $project = Project::create();
            $project->pivits()->attach($pivit);
            // $pivit->projects()->attach($project);
        }

        // for ($i = 0; $i < $loop; $i++) {
        //     array_push($data, ['name' => 'Test' . $i);
        // }
        // echo "Inserting...\n";
        // Project::insert($data);
        // echo "Completed\n";
    }
}
