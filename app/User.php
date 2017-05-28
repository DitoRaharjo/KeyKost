<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'penyewa_id',
        'rfid_id',
        'fullname',
        'email',
        'no_kamar',
        'jenis_kelamin',
        'telp',
        'alamat',
        'image',
        'password',
        'lupa_pass',
        'status',
        'register_date',
        'exp_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'status',
        'penyewa_id',
        'role_id',
        'lupa_pass',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function role() {
      return $this->belongsTo('App\Role');
    }

    public function userLog() {
      return $this->hasOne('App\UserLog');
    }

    public function pemilikKost() {
      return $this->hasOne('App\Kost', 'pemilik_id');
    }

    public function penyewaKost() {
      return $this->belongsTo('App\Kost', 'penyewa_id');
    }
}
