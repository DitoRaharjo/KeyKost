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

class KostController extends Controller
{
  public function index() {
    $semuaKost = Kost::where('deleted_at', '=', null)->orderBy('created_at', 'desc')->get();

    return view('backend.kost.index', compact('semuaKost', 'semuaPemilik'));
  }

  public function create() {
    $semuaPemilik = User::where('role_id', '=', 2)->orderBy('created_at', 'desc')->get();

    return view('backend.kost.create', compact('semuaPemilik'));
  }

  public function store(Request $request) {
    $this->validate($request, [
        'nama' => 'required',
        // 'pemilik_id' => 'required',
        'alamat' => 'required',
    ]);
    $kost_data = $request->except('_token');

    DB::beginTransaction();

    try {
      Kost::create($kost_data);

      DB::commit();

      alert()->success('Kost berhasil di tambahkan', 'Tambah Kost Berhasil!');
      return redirect()->route('back.kost.index');
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  public function edit($id) {
    $semuaPemilik = User::where('role_id', '=', 2)->orderBy('created_at', 'desc')->get();
    $kost = Kost::find($id);

    return view('backend.kost.edit', compact('semuaPemilik', 'kost'));
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
        'nama' => 'required',
        // 'pemilik_id' => 'required',
        'alamat' => 'required',
    ]);
    $kost_data = $request->except('_token');

    DB::beginTransaction();

    try {
      $kost = Kost::find($id);
      $kost->update($kost_data);

      DB::commit();

      alert()->success('Kost berhasil di edit', 'Edit Kost Berhasil!');
      return redirect()->route('back.kost.index');
    } catch (\Exception $e) {
      DB::rollback();
      throw $e;
    }
  }

  public function destroy($id) {
    $kost = Kost::find($id);
    $kost->deleted_at = Carbon::now();
    $kost->save();

    alert()->success('Kost berhasil dihapus', 'Hapus Kost Berhasil!');
    return redirect()->route('back.kost.index');
  }
}
