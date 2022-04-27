<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;


class C_user extends Controller
{
    public function index()
    {
        $user = DB::table('user')->get();
        $role = DB::table('role')->get();
        $nama = Auth::user()->name;


        $data = array(
            'menu' => 'user',
            'user' => $user,
            'role' => $role,
            'submenu' => '',
        );

        return view('/user/view_user',$data); 
    }

    public function insert_user()
    {
        $nama = Auth::user()->name;
        $user = DB::table('user')->get();
        $role = DB::table('role')->get();

        $data = array(
            'menu' => 'user',
            'nama' => $nama,
            'user' => $user,
            'role' => $role,
            'submenu' => '',
        );

        return view('/user/tambah_user',$data); 
    }

    
    public function tambah_user(Request $post)
    {
        $user = User::create(request(['ID_USER','NAMA_SKPD', 'USERNAME', 'email', 'password','KEPALA_SKPD','NIP_KEPALA', 'ID_ROLE']));

        return redirect('/user');
    }


    public function edit_user($ID_USER) 
    {
        $nama = Auth::user()->name;
        $user = DB::table('user')->where('ID_USER', $ID_USER)->get();
        $role = DB::table('role')->get();
    
        $data = array(
            'menu' => 'user',
            'nama' => $nama,
            'user' => $user,
            'role' => $role,
            'submenu' => ''          
        );
        return view('user/edit_user',$data);
    }

    public function update_user(Request $post)
    {
        
        if($post->PASSWORD){
            DB::table('user')->where('ID_USER', $post->ID_USER)->update([
                'ID_USER' => $post->ID_USER,
                'NAMA_SKPD' => $post->NAMA_SKPD,
                'USERNAME' => $post->USERNAME,
                'email' => $post->email,
                'password' => $post->password,
                'KEPALA_SKPD' => $post->KEPALA_SKPD,
                'NIP_KEPALA' => $post->NIP_KEPALA,
                'ID_ROLE' => $post->ID_ROLE,
                
            ]);
            $user = User::find($post->ID_USER);

            $user->password = $post->password;

            $user->save();
        }else{
            DB::table('user')->where('ID_USER', $post->ID_USER)->update([
                'ID_USER' => $post->ID_USER,
                'NAMA_SKPD' => $post->NAMA_SKPD,
                'USERNAME' => $post->USERNAME,
                'email' => $post->email,
                'password' => $post->password,
                'KEPALA_SKPD' => $post->KEPALA_SKPD,
                'NIP_KEPALA' => $post->NIP_KEPALA,
                'ID_ROLE' => $post->ID_ROLE,
            ]);
        }
              
        //kembali ke halaman data anggota
        return redirect('/user');
    }

    public function hapus($ID_USER)
    {
    	DB::table('user')->where('ID_USER',$ID_USER)->delete();
	    return redirect('/user');
    }

}
