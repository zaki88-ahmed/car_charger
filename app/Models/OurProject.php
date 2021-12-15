<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProject extends Model
{
    use HasFactory;


    protected $fillable = ['title','image','body'];

    protected $hidden = ['created_at', 'updated_at'];
}
