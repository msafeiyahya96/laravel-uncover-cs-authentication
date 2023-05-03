<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('jurusan.index', ['jurusans' => Jurusan::all()]);
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $validateData   = $request->validate([
            'nama_jurusan'      => 'required',
            'nama_dekan'        => 'required',
            'jumlah_mahasiswa'  => 'required|min:10|integer',
        ]);

        Jurusan::create($validateData);
        
        return redirect('/')->with('pesan', "Jurusan $request->nama_jurusan berhasil ditambahkan.");
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    public function edit(Jurusan $jurusan)
    {
        //
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    public function destroy(Jurusan $jurusan)
    {
        //
    }
}
