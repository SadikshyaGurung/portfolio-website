<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey = 'skill_id';  // if you renamed 'id' to 'skill_id'

    protected $fillable = [
        'title',
        'description',
    ];

public function projects()
{
    return $this->belongsToMany(Project::class, 'project_skill');
}

}
