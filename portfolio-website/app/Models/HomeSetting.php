<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'welcome_heading',
        'welcome_text',
        'featured_projects',
        'about_text',
    ];

    protected $casts = [
        'featured_projects' => 'array',
    ];
}
