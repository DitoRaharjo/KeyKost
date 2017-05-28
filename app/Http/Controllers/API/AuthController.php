<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;
use Hash;

use App\User;
use App\Role;

class AuthController extends Controller
{
  public function auth(Request $request) {
    $input_data = $request->only(
      'email',
      'password'
    );

    $checkEmail = User::where('email', '=', $input_data['email'])->first();

    if($checkEmail == null) {
      $result = [
        'status' => 404,
        'info' => 'user not found',
      ];
      return response()->json($result, 404);
    } else {
      if(strcasecmp($checkEmail->role->name, "Pemilik Kost")==0) {
        if($checkEmail->status == 0) {
          $result = [
            'status' => 404,
            'info' => 'user status inactive, please contact admin for further information',
          ];
          return response()->json($result, 404);
        } else {
          if(Hash::check($input_data['password'], $checkEmail->password)) {
            unset($checkEmail->role_id);
            unset($checkEmail->lupa_pass);
            unset($checkEmail->status);
            unset($checkEmail->register_date);
            unset($checkEmail->created_at);
            unset($checkEmail->updated_at);
            unset($checkEmail->deleted_at);
            unset($checkEmail->created_by);
            unset($checkEmail->updated_by);
            unset($checkEmail->deleted_by);

            $user = [
              'pemilikKost_id' => $checkEmail->id,
              'kost_id' => $checkEmail->pemilikKost->id
            ];

            $result = [
              'status' => 200,
              'user' => $user
            ];
            return response()->json($result, 200);
          } else {
            $result = [
              'status' => 404,
              'info' => 'incorrect email and password combination'
            ];
            return response()->json($result, 404);
          }
        }
      } else {
        $result = [
          'status' => 404,
          'info' => 'Only Pemilik Kost can logged in'
        ];
        return response()->json($result, 404);
      }
    }
  }
}
