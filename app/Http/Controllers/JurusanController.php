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
        // 
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Jurusan $jurusan)
    {
        //
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
