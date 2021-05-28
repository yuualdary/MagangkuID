<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class roleuser extends Model
{
    use HasFactory;
    use UsesUuid;

    public function users(){

        return $this->hasMany(user::class,'role_id','id');
    }
}
