<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'project_id'; // If your PK is project_id instead of id

    public $incrementing = true; // set false if your PK is non-incrementing

    protected $keyType = 'int'; // or 'string' if PK is string

    protected $fillable = [
        'project_id',  // if you are manually entering this (otherwise omit)
        'title',
        'description',
        
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill', 'project_id', 'skill_id');
    }
}
