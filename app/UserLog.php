<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
  protected $table = 'user_log';

  protected $fillable = [
    'user_id',
    'kost_id',
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function kost() {
    return $this->belongsTo('App\Kost');
  }
}
