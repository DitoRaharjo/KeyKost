<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $table = 'log';

  protected $fillable = [
    'rfid_id',
    'created_at',
    'updated_at',
  ];
}
