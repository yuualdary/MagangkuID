<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;


class company extends Model
{
    use HasFactory;
    use UsesUuid;


    protected $fillable =['companyname','companyaddress','companyprofile','companyweb','companyphoto'];
    
    public function users(){

        return $this->belongsTo(user::class);
        

    }
    public function jobs(){

        return $this->hasMany(job::class,'company_id','id');
        

    }
}
