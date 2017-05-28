<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;

use App\Log;
use App\Kost;
use App\UserLog;
use App\Role;

class KostController extends Controller
{
  // public function getLogKost(Request $request) {
  //   $pemilik = User::find($input['pemilikKost_id']);
  //   $kostId = $pemilik->pemilikKost->id;
  //
  //   $logPenyewa = UserLog::where('kost_id', '=', $kostId)->get();
  //
  //   $result = array();
  //   foreach ($logPenyewa as $penyewa) {
  //     $result[] = [
  //       'nama' => $penyewa->user->fullname,
  //       'waktu' => $penyewa->created_at
  //     ];
  //   }
  //   return response()->json($result);
  // }

  public function getLogKost($id) {
    $logPenyewa = UserLog::where('kost_id', '=', $id)->get();

    $result = array();
    foreach ($logPenyewa as $penyewa) {
      $result[] = [
        'nama' => $penyewa->user->fullname,
        'waktu' => $penyewa->created_at
      ];
    }
    return response()->json($result);
  }
}
