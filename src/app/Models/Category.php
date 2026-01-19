<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    // create() や factory() でまとめて代入できるカラム
    protected $fillable = ['name'];
}