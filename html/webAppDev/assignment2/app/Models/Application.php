<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'justification',
        'project_id',
        'user_id',
    ];

    function project() {
        return $this->belongsTo(Project::class);
        }
    
    function user() {
            return $this->belongsTo(User::class);
            }
}
