<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
     
    protected $fillable = ['project_id', 'title', 'description', 'skills','image_url'];
public function skills()
{
    return $this->belongsToMany(Skill::class, 'project_skill');
}

}
