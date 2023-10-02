<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'inp_name',
        'email',
        'description',
        'students_required',
        'year',
        'trimester',
        'image',
        // 'pdf',
    ];
}
