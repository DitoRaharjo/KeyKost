<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;

use App\Log;
use App\Kost;
use App\User;
use App\UserLog;
use App\Role;

class UserController extends Controller
{
  public function getAllPenyewa(Request $request) {
    // $input = $request->only('pemilikKost_id');
    //
    // if($input['pemilikKost_id'] != null) {
    //   $pemilik = User::find($input['pemilikKost_id']);
    //   $kostId = $pemilik->pemilikKost->id;
    //
    //   $penyewa = User::where([
    //     ['penyewa_id', '=', $kostId],
    //     ['deleted_at', '=', null]
    //     ])->get();
    //
    //   return response()->json($penyewa);
    // } else {
    //   $result = [
    //     'status' => 500,
    //     'info' => 'pemilikKost_id is NULL'
    //   ];
    //   return response()->json($result, 500);
    // }

    $input = $request->only('kost_id');

    if($input['kost_id'] != null) {
      $penyewa = User::where([
        ['penyewa_id', '=', $input['kost_id']],
        ['deleted_at', '=', null]
        ])->get();

      return response()->json($penyewa);
    } else {
      $result = [
        'status' => 500,
        'info' => 'kost_id is NULL'
      ];
      return response()->json($result, 500);
    }

  }

  public function getOnePenyewa($id) {
    $penyewa = User::find($id);

    if($penyewa == null) {
      $result = [
        'status' => 404,
        'info' => 'Penyewa not found'
      ];
      return response()->json($result, 404);
    } else {
      if(strcasecmp($penyewa->role->name, 'Penyewa Kost')==0 ) {
        return response()->json($penyewa);
      } else {
        $result = [
          'status' => 404,
          'info' => 'This user is not Penyewa'
        ];
        return response()->json($result, 404);
      }
    }
  }

  public function getLogPenyewa($id) {
    $logPenyewa = UserLog::where('user_id', '=', $id)->get();

    if($logPenyewa == null) {
      $result = [
        'status' => 404,
        'info' => 'Log penyewa not found'
      ];
      return response()->json($result, 404);
    } else {
      return response()->json($logPenyewa);
    }
  }

  public function registerPenyewa(Request $request) {
    $input_data = $request->only(
      'id_pemilikKost',
      'fullname',
      'rfid_id',
      'no_kamar',
      'email',
      'password',
      'telp',
      'alamat'
    );

    $input_data['password'] = bcrypt($input_data['password']);

    $pemilikKost = User::find($input_data['id_pemilikKost']);

    $roleId = Role::select('id')->where('name', 'LIKE', 'Penyewa Kost')->first();
    $input_data['role_id'] = $roleId->id;
    $input_data['status'] = '1';
    $input_data['penyewa_id'] = $pemilikKost->pemilikKost->id;
    $input_data['registerdate'] = Carbon::now();

    DB::beginTransaction();
    try
    {
      User::create($input_data);
      DB::commit();

      $result = [
        'status' => 200,
        'info' => 'Penyewa kost created'
      ];
      return response()->json($result, 200);
    } catch (\QueryException $ex) {
      DB::rollback();
      $result = [
        'status' => 500,
        'info' => $ex
      ];
      return response()->json($result, 500);
    }
  }

  public function updatePenyewa(Request $request) {
    $input_data = $request->only(
      'id',
      'fullname',
      'rfid_id',
      'no_kamar',
      'email',
      'password',
      'telp',
      'alamat'
    );

    if($input_data['password'] == null) {
      unset($input_data['password']);
    } else {
      $input_data['password'] = bcrypt($input_data['password']);
    }

    $user = User::find($input_data['id']);
    unset($input_data['id']);

    if($user == null) {
      $result = [
        'status' => 404,
        'info' => 'Penyewa not found'
      ];
      return response()->json($result, 404);
    } else {
      if(strcasecmp($user->role->name, 'Penyewa Kost')==0 ) {
        DB::beginTransaction();
        try
        {
          $user->update($input_data);

          DB::commit();

          $result = [
            'status' => 200,
            'info' => 'Penyewa kost '.$user->fullname.' updated'
          ];
          return response()->json($result, 201);
        } catch (\QueryException $ex) {
          DB::rollback();
          $result = [
            'status' => 500,
            'info' => $ex
          ];
          return response()->json($result, 500);
        }
      } else {
        $result = [
          'status' => 404,
          'info' => 'This user is not Penyewa'
        ];
        return response()->json($result, 404);
      }
    }

  }

  public function deletePenyewa($id) {
    $user = User::find($id);

    if($user == null) {
      $result = [
        'status' => 404,
        'info' => 'Penyewa not found'
      ];
      return response()->json($result, 404);
    } else {
      if(strcasecmp($user->role->name, 'Penyewa Kost')==0 ) {
        $user->deleted_at = Carbon::now();
        $user->save();

        $result = [
          'status' => 200,
          'info' => 'Penyewa kost '.$user->fullname.' deleted'
        ];
        return response()->json($result, 200);
      } else {
        $result = [
          'status' => 404,
          'info' => 'This user is not Penyewa'
        ];
        return response()->json($result, 404);
      }
    }
  }
}
