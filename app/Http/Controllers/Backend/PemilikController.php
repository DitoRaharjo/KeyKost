<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;

use App\Log;
use App\Kost;
use App\User;
use App\UserLog;
use App\Role;

class PemilikController extends Controller
{
  public function index() {
    $semuaPemilik = User::where('role_id', '=', 2)->orderBy('created_at', 'desc')->get();

    return view('backend.pemilik.index', compact('semuaPemilik'));
  }

  public function create() {
    $semuaKost = Kost::where('pemilik_id', '=', null)->orderBy('created_at', 'desc')->get();

    return view('backend.pemilik.create', compact('semuaKost'));
  }

  public function store(Request $request) {
    $this->validate($request, [
        'fullname' => 'required',
        'kost_id' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);
    $pemilik_data = $request->except('_token');

    $pemilik_data['password'] = bcrypt($pemilik_data['password']);
    $pemilik_data['role_id'] = 2;
    $pemilik_data['status'] = '1';

    DB::beginTransaction();

    try {
      $pemilik = User::create($pemilik_data);

      $kost = Kost::find($pemilik_data['kost_id']);
      $kost->pemilik_id = $pemilik->id;
      $kost->save();

      DB::commit();

      alert()->success('Pemilik berhasil di tambahkan', 'Tambah Pemilik Berhasil!');
      return redirect()->route('back.pemilik.index');
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  public function edit($id) {
    $semuaKost = Kost::all();
    $pemilik = User::find($id);

    return view('backend.pemilik.edit', compact('semuaKost', 'pemilik'));
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
        'fullname' => 'required',
        'kost_id' => 'required',
        'email' => 'required',
    ]);
    $pemilik_data = $request->except('_token');

    if(array_key_exists('password', $pemilik_data)) {
      $pemilik_data['password'] = bcrypt($pemilik_data['password']);
    }

    DB::beginTransaction();

    try {
      $pemilik = User::find($id);

      $kost = Kost::find($pemilik_data['kost_id']);
      $kost->pemilik_id = $pemilik->id;
      $kost->save();

      DB::commit();

      alert()->success('Pemilik berhasil di ubah', 'Ubah Pemilik Berhasil!');
      return redirect()->route('back.pemilik.index');
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  public function destroy($id) {
    $pemilik = User::find($id);
    $pemilik->deleted_at = Carbon::now();
    $pemilik->save();

    alert()->success('Pemilik berhasil dihapus', 'Hapus Pemilik Berhasil!');
    return redirect()->route('back.pemilik.index');
  }
}
