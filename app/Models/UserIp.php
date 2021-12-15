<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIp extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'ip'];

    protected $hidden =  ['created_at', 'updated_at'];

    public function IpOfUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function IpRate(){
        return $this->hasOne(Rate::class, 'user_ip', 'id');
    }
}
