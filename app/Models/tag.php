<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\jobtotag;
use App\Models\candidate;

use App\Traits\UsesUuid;


class tag extends Model
{
    use HasFactory;
    use UsesUuid;


    protected $fillable = ['prefix','tagname'];
    
    public function job_to_tags(){

        return $this->belongsTo(jobtotag::class);
    }
    public function candidates(){

        return $this->belongsTo(candidates::class);
    }

}


