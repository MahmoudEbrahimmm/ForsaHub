<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, HasUlids, SoftDeletes;
    protected $table = 'companies';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name','address','industry','website','deleted_at','owner_id'];
    protected $dates = ['deleted_at'];
    protected function casts(): array
    {return ['deleted_at' => 'datetime'];}

    public function owner(){
        return $this->belongsTo(User::class,'owner_id','id');
    }
    public function jobVacancies(){
        return $this->hasMany(JobVacancy::class, 'category_id','id');
    }

}
