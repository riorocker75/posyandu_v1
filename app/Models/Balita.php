<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;
    protected $table= "balita";
   public $timestamps = false;
   protected $fillable =[
      'nama',
   ];
}
