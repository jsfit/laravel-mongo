<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Project;
use App\Models\Pivit;

class Team extends Model
{
    use HasFactory;

    // public function projects()
    // {
    //     return $this->belongsToMany(
    //         Project::class
    //     );
    // }

    public function projects(){
        // return $this->belongsTo(
        //     Pivit::class, "pivit_id", "_id"
        // )->with("projects");

        return $this->hasManyThrough(Project::class, Pivit::class);

    }
}
