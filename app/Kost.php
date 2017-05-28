<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
  protected $table = 'kost';

  protected $fillable = [
    'pemilik_id',
    'nama',
    'alamat',
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  public function log() {
    return $this->hasOne('App\UserLog');
  }

  public function pemilik() {
    return $this->belongsTo('App\User', 'pemilik_id');
  }

  public function penyewa() {
    return $this->hasMany('App\User', 'penyewa_id');
  }
}
