<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Project;
use App\Models\Pivit;

class Project extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsToMany(
            Team::class
        );
    }

    public function pivits()
    {
        return $this->belongsToMany(
            Pivit::class
        );
    }
}
