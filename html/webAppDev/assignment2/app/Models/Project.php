<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'students_required',
        'year',
        'trimester',
    ];

    public function application()
        {
            return $this->hasMany(Application::class);
        }
    
        public function student_project_project()
        {
            return $this->hasMany(Student_Project::class);
        }

        public function image()
        {
            return $this->hasMany(Image::class);
        }

        public function pdf()
        {
            return $this->hasMany(Application::class);
        }

        public function admin_project_project()
        {
            return $this->hasOne(Admin_Project::class);
        }
}
