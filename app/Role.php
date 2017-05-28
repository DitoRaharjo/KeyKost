<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'role';

  protected $fillable = [
    'name',
    'created_at',
    'updated_at',
    'deleted_at',
    'created_by',
    'updated_by',
    'deleted_by',
  ];

  public function users() {
      return $this->hasMany('App\User', 'role_id');
  }
}
