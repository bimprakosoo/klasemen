<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
  protected $table = 'klubs';
  use HasFactory;
  protected $fillable = [
    'name',
    'kota_klub',
    'point',
  ];
}
