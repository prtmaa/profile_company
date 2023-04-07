<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fitur.index');
    }

    public function data()
    {
        $fitur = Fitur::orderBy('id', 'desc')->get();

        return DataTables()
            ->of($fitur)
            ->addIndexColumn()
            ->addColumn('gambar', function ($fitur) {
                return '<img src="' . $fitur->gambar . '" alt="" style="width: 100px">';
            })
            ->addColumn('aksi', function ($fitur) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('fitur.update', $fitur->id) . '`)" class="btn btn-xs btn-info"><i class="fa fa-pen"></i></button>
                    <button type="button" onclick="deleteData(`' . route('fitur.destroy', $fitur->id) . '`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'gambar'])
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
        $fitur = new Fitur();
        $fitur->judul = $request->judul;
        $fitur->deskripsi = $request->deskripsi;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = 'fitur-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $fitur->gambar = "/img/$nama";
        }

        $fitur->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fitur = Fitur::find($id);

        return response()->json($fitur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fitur $fitur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fitur = Fitur::find($id);
        $fitur->judul = $request->judul;
        $fitur->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $fitur->gambar = "/img/$nama";
        }

        $fitur->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fitur = Fitur::find($id);
        File::delete($fitur->gambar);
        $fitur->delete();

        return response(null, 204);
    }
}
