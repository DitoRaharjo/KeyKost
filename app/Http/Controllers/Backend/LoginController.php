<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Hash;
use Carbon\Carbon;
use Auth;

use App\User;
use App\Role;

class LoginController extends Controller
{
  public function dashboardAdmin() {
    // return view('backend.dashboard.index');
    return redirect()->route('back.kost.index');
  }

  public function login() {
    // if (Auth::check()) {
    //   if(Auth::user()->status == 1) {
    //     if(Auth::user()->deleted_at == NULL) {
    //       if (strcasecmp(Auth::user()->role->name,'Administrator')==0) {
    //         return redirect()->route('dashboard.admin');
    //       } else {
    //         alert()->error('Maaf anda tidak dapat masuk ke sini', 'Gagal Login!');
    //         Auth::logout();
    //         return redirect()->route('user.login');
    //       }
    //     } else {
    //       Auth::logout();
    //       alert()->error('Mohon maaf akun anda telah di HAPUS oleh admin, silahkan hubungi admin', 'Akun Dihapus!');
    //       return redirect()->route('user.login');
    //     }
    //   } else {
    //     Auth::logout();
    //     alert()->error('Mohon maaf akun anda telah di NON-AKTIFKAN oleh admin, silahkan hubungi admin', 'Akun Non-Aktif!');
    //     return redirect()->route('user.login');
    //   }
    // } else {
    //   return view('backend.login.index');
    // }

    echo "test";
  }

  public function doLogin(Request $request) {
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user_data = $request->except('_token');

    if(Auth::attempt($user_data))
    {
      if(Auth::user()->status == 1) {
        if(Auth::user()->deleted_at == NULL) {
          if (strcasecmp(Auth::user()->role->name,'Administrator')==0) {
            return redirect()->route('dashboard.admin');
          } else {
            alert()->error('Maaf anda tidak dapat login di sini', 'Gagal Login!');
            Auth::logout();
            return redirect()->route('user.login');
          }
        } else {
          Auth::logout();
          alert()->error('Mohon maaf akun anda telah di HAPUS oleh admin, silahkan hubungi admin', 'Akun Dihapus!');
          return redirect()->route('user.login');
        }
      } else {
        Auth::logout();
        alert()->error('Mohon maaf akun anda telah di NON-AKTIFKAN oleh admin, silahkan hubungi admin', 'Akun Non-Aktif!');
        return redirect()->route('user.login');
      }
    } else {
      alert()->error('Username atau Password anda salah', 'Gagal Login!');
      return redirect()->route('user.login');
    }
  }

  public function doLogout()
  {
    Auth::logout();

    alert()->success('Berhasil Log Out', 'Log Out!');
    return redirect()->route('user.login');
  }
}
