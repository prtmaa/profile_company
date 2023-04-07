<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('about.index');
    }

    public function show()
    {
        return About::first();
    }

    public function update(Request $request)
    {
        $about = About::first();
        $about->nama = $request->nama;
        $about->deskripsi = $request->deskripsi;
        $about->tentang = $request->tentang;
        $about->alamat = $request->alamat;
        $about->telepon = $request->telepon;
        $about->map = $request->map;
        $about->fb = $request->fb;
        $about->ig = $request->ig;
        $about->yt = $request->yt;

        if ($request->hasFile('logo')) {
            File::delete($about->logo);
            $file = $request->file('logo');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $about->logo = "img/$nama";
        }

        if ($request->hasFile('background')) {
            File::delete($about->background);
            $file = $request->file('background');
            $nama = 'background-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $about->background = "img/$nama";
        }


        $about->update();

        return response()->json('Data berhasil disimpan', 200);
    }
}
