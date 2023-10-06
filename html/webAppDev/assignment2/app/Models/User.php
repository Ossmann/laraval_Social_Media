<?php

namespace App\Models;
use App\Models\Admin_Project;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gpa',
        'type',
        'student_project_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin_projects() {
        return $this->hasMany(Admin_Project::class);
        }

    public function role()
        {
            return $this->hasMany(Role::class);
        }

    public function user_application()
        {
            return $this->hasMany(Application::class);
        }

        public function student_project()
        {
            return $this->belongsTo(Student_Project::class);
        }

        
}
