<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_name',
        'user_id',
    ];


    function user_role() {
        return $this->belongsTo(User::class);
        }


}
