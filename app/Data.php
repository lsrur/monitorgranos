<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  protected $table = 'data';
  protected $guarded = [''];
  public $timestamps = false;
  protected $casts = [];
}
