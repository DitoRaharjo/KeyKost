<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input as Input;

class TestController extends Controller
{
    public function urlQuery(Request $request) {
      $path = $request->path();
      $method = $request->method();
      $header = $request->header();
      $input = $request->all();

      return response()->json(["path" => $path, "method" => $method, "header" => $header, "input" => $input]);
    }

    public function postTest(Request $request) {
      $method = $request->method();
      $header = $request->header();
      $input = $request->all();

      return response()->json(["method" => $method, "header" => $header, "input" => $input]);
    }

    public function putTest(Request $request) {
      $method = $request->method();
      $header = $request->header();
      $input = $request->all();

      return response()->json(["method" => $method, "header" => $header, "input" => $input]);
    }

    public function patchTest(Request $request) {
      $method = $request->method();
      $header = $request->header();
      $input = $request->all();

      return response()->json(["method" => $method, "header" => $header, "input" => $input]);
    }

    public function deleteTest(Request $request) {
      $method = $request->method();
      $header = $request->header();
      $input = $request->all();

      return response()->json(["method" => $method, "header" => $header, "input" => $input]);
    }
}
