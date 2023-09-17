<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isRole()
    {
        $isRole = User::find($this->id);
        // dd($isRole->role->role);
        if ($isRole != null) {
            $role = $isRole->role->role;
        } else {
            $role = 'user';
        }
        return $role;
    }

    public function isAdmin()
    {
        if ($this->isRole() == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function isAuditor()
    {
        if ($this->isRole() == 'auditor') {
            return true;
        } else {
            return false;
        }
    }

    public function isUser()
    {
        if ($this->isRole() == 'user') {
            return true;
        } else {
            return false;
        }
    }
}
