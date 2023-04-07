<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('slider.index');
    }

    public function data()
    {
        $slider = Slider::orderBy('id', 'desc')->get();

        return DataTables()
            ->of($slider)
            ->addIndexColumn()
            ->addColumn('gambar', function ($slider) {
                return '<img src="' . $slider->gambar . '" alt="" style="width: 100px">';
            })
            ->addColumn('aksi', function ($slider) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('slider.update', $slider->id) . '`)" class="btn btn-xs btn-info"><i class="fa fa-pen"></i></button>
                    <button type="button" onclick="deleteData(`' . route('slider.destroy', $slider->id) . '`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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
        $slider = new Slider();
        $slider->judul = $request->judul;
        $slider->deskripsi = $request->deskripsi;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = 'slider-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $slider->gambar = "/img/$nama";
        }

        $slider->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $slider = Slider::find($id);

        return response()->json($slider);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->judul = $request->judul;
        $slider->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $slider->gambar = "/img/$nama";
        }

        $slider->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return response(null, 204);
    }
}
