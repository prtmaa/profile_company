<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pesan.index');
    }

    public function data()
    {
        $pesan = Pesan::orderBy('id', 'desc')->get();

        return DataTables()
            ->of($pesan)
            ->addIndexColumn()

            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = new Pesan();
        $pesan->nama = $request->nama;
        $pesan->telepon = $request->telepon;
        $pesan->pesan = $request->pesan;

        $pesan->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        //
    }
}
