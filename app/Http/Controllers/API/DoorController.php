<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Log;

class DoorController extends Controller
{
  public function log(Request $request) {
    $input = $request->only('rfid_tag');

    $log_data = array();

    $log_data['rfid_id'] = $input['rfid_tag'];

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
}
