<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey = 'skill_id';
public $incrementing = true;
protected $keyType = 'int';

    protected $fillable = [
        'title',
        'description',
    ];

public function projects()
{
    return $this->belongsToMany(Project::class, 'project_skill', 'skill_id', 'project_id');
}


}
