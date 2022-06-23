<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class C_login extends Controller
{
    //
    public function index()
    {
        $data = array(
            'menu' => '',
            // 'pengaduan' => $pengaduan,
            // 'opd' => $opd,
            // 'status_pengaduan' => $status_pengaduan,
            // 'jenis_pengaduan' => $jenis_pengaduan,
            // 'user' => $user,
            'submenu' => '',
        );

        return view('/login/login',$data); 
    }

       
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->to('/');
        } else {
            $data = ['name' => 'login tidak berhasil'];
            return view('login.login',$data);
        }
    }

    public function getLogin1()
    {
        $data = ['name' => ''];
        return view('login.formLoginAdmin',$data);
    }

    public function postLogin1(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->emailusername,
            'password' => $request->password,
            'roles_id' =>1,
        ])){
            return redirect('/halamanAnggota');
        }
        elseif(Auth::attempt([
            'username' => $request->emailusername,
            'password' => $request->password,
            'roles_id' =>1,
        ])){
            return redirect('/halamanAnggota');
        }

        else{
            $data = ['name' => 'login tidak berhasil'];
            return view('login.formLogin',$data);
        }
    }

}