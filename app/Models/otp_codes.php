<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otp_codes extends Model
{
    use HasFactory;


    protected $fillable=['otp','exp'];


    public function User(){

        return $this->HasOne(user::class);
    }
}



