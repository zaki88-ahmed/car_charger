<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastNew extends Model
{
    use HasFactory;


    public $fillable = ['title','image','body'];

    protected $hidden = ['created_at', 'updated_at'];


}
