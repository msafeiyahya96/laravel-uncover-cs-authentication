<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dataMahasiswa(Request $request) {
        // Menggunakan Facade Class Auth
        $facade = "Menggunakan Facade Class Auth";
        $id     = Auth::user()->id;
        $name   = Auth::user()->name;
        $email  = Auth::user()->email;
        // dump(Auth::user());

        // Menggunakan Request object
        $request_object = "Menggunakan Request object";
        $id_request     = $request->user()->id;
        $name_request   = $request->user()->name;
        $email_request  = $request->user()->email;
        return view('halaman', [
            'judul'         => 'Data Mahasiswa',
            'judul_facade'  => $facade,
            'id'            => $id,
            'name'          => $name,
            'email'         => $email,
            'judul_request' => $request_object,
            'id_request'    => $id_request,
            'name_request'  => $name_request,
            'email_request' => $email_request,
        ]);
    }
    
    public function tabelMahasiswa(Request $request) {
        // Menggunakan Facade Class Auth
        $facade = "Menggunakan Facade Class Auth";
        $id     = Auth::user()->id;
        $name   = Auth::user()->name;
        $email  = Auth::user()->email;
        // dump(Auth::user());

        // Menggunakan Request object
        $request_object = "Menggunakan Request object";
        $id_request     = $request->user()->id;
        $name_request   = $request->user()->name;
        $email_request  = $request->user()->email;
        return view('halaman', [
            'judul'         => 'Tabel Mahasiswa',
            'judul_facade'  => $facade,
            'id'            => $id,
            'name'          => $name,
            'email'         => $email,
            'judul_request' => $request_object,
            'id_request'    => $id_request,
            'name_request'  => $name_request,
            'email_request' => $email_request,
        ]);
    }

    public function blogMahasiswa(Request $request) {
        // Menggunakan Facade Class Auth
        $facade = "Menggunakan Facade Class Auth";
        $id     = Auth::user()->id;
        $name   = Auth::user()->name;
        $email  = Auth::user()->email;
        // dump(Auth::user());

        // Menggunakan Request object
        $request_object = "Menggunakan Request object";
        $id_request     = $request->user()->id;
        $name_request   = $request->user()->name;
        $email_request  = $request->user()->email;
        return view('halaman', [
            'judul'         => 'Blog Mahasiswa',
            'judul_facade'  => $facade,
            'id'            => $id,
            'name'          => $name,
            'email'         => $email,
            'judul_request' => $request_object,
            'id_request'    => $id_request,
            'name_request'  => $name_request,
            'email_request' => $email_request,
        ]);
    }
}
