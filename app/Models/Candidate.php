<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Candidate extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable=['cv','status','job_id','user_id'];

    public function users(){

        return $this->hasOne(user::class,'id','user_id');
    }

    public function jobs(){

        return $this->hasMany(job::class,'id','job_id');
    }

    public function tags(){

        return $this->hasOne(tag::class,'id','status');
    }



}



