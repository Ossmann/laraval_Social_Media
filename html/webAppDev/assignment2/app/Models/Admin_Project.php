<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
    ];

    function project_application() {
        return $this->belongsTo(Project::class);
        }
    
        public function user_admin()
        {
            return $this->belongsTo(User::class);
        }
}
