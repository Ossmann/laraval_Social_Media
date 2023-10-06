<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
    ];

    public function students()
        {
            return $this->hasMany(User::class);
        }

        public function project()
        {
            return $this->belongsTo(Project::class);
        }
}
