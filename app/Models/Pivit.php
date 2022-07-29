<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Team;
use App\Models\Project;
class Pivit extends Model
{
    use HasFactory;

    function projects(){
        // return $this->hasMan(Project::class);
        /**
         * Get all of the comments for the Pivit
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function comments(): HasManyThrough
        {
            return $this->hasManyThrough(Comment::class, Post::class);
        }
    }
}
