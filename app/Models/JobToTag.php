<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use App\Models\job;
use App\Models\tag;


class JobToTag extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable =['tag_id','job_id'];

    public function tags(){

        return $this->hasMany(tag::class,'id','tag_id');
    }

    public function jobs(){

        return $this->hasOne(job::class,'id','job_id');
    }
    

}
