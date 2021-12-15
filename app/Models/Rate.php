<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['user_ip', 'rate'];

    protected $hidden =  ['created_at', 'updated_at'];


    public function RateIp(){
        return $this->belongsTo(UserIp::class, 'user_ip', 'id');
    }
}
