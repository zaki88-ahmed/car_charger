<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable  = ['email','phone','address'];

    protected $hidden = ['created_at', 'updated_at'];
}
