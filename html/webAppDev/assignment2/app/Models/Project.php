<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Adminproject;
use App\Models\Image;
use App\Models\Pdf;

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

        public function images()
        {
            return $this->hasMany(Image::class);
        }

        public function pdfs()
        {
            return $this->hasMany(Pdf::class);
        }

        public function adminproject()
        {
            return $this->hasOne(Adminproject::class);
        }
}
