<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasUuids, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {return ['email_verified_at' => 'datetime', 'password' => 'hashed', 'deleted_at' => 'datetime'];}

    public function resumes(){
        return $this->hasMany(User::class,'user_id','id');
    }
    public function jobApplications(){
        return $this->hasMany(JobApplication::class, 'user_id','id');
    }
    public function company(){
        return $this->hasOne(Company::class,'owner_id','id');
    }

}
