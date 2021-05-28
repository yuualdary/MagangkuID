<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobToTag;
use App\Traits\UsesUuid;

class job extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable =['title','fee','description','requirement','company_id',];


    public function JobToTags(){

        return $this->hasMany(JobToTag::class,'job_id','id');
    }


    
    public function companies(){

        return $this->hasOne(company::class,'id','company_id');
    }

    


}
