<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;

use App\Log;
use App\User;
use App\Kost;
use App\UserLog;

class DoorController extends Controller
{
  public function log(Request $request) {
    $input = $request->only('rfid_tag');

    $log_data = array();
    $log_data['rfid_id'] = $input['rfid_tag'];

    if(strcasecmp($input['rfid_tag'], "NO_AUTH")!=0 ) {
      $this->userLog($input['rfid_tag']);
    }

    DB::beginTransaction();
    try
    {
      Log::create($log_data);

      DB::commit();

      $result = [
        'status' => 200,
        'info' => 'true'
      ];
      return response()->json($result, 200);
    } catch (\Exception $ex) {
      DB::rollback();
      $result = [
        'status' => 500,
        'info' => "false",
        'exception' => $ex
      ];
      return response()->json($result, 500);
    }
  }

  public function userLog($rfid_id) {
    $penyewa = User::where('rfid_id', 'LIKE', $rfid_id)->first();

    $userLog_data = array();
    $userLog_data['user_id'] = $penyewa->id;
    $userLog_data['kost_id'] = $penyewa->penyewa_id;

    DB::beginTransaction();
    try
    {
      UserLog::create($userLog_data);
      DB::commit();

      $result = [
        'status' => 200,
        'info' => 'true'
      ];
      return response()->json($result, 200);
    } catch (\Exception $ex) {
      DB::rollback();
      $result = [
        'status' => 500,
        'info' => "false",
        'exception' => $ex
      ];
      return response()->json($result, 500);
    }
  }
}
