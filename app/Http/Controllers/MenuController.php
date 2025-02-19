<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data = Menu::paginate(10);
        return view('menu.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('menu.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        // rules mengisi form
        $request->validate([
            'nama' => 'string|min:3|max:20|required|unique:menu',
            'thumbnail' => 'max:10240|required',
            'harga' => 'integer|min:100|required',
            'deskripsi' => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $gambar = $request->file('thumbnail'); //mengambil nilai atau file.
            $path = 'public/images/menu'; //menentukan path penyimpanan.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension asli.
            $nama = 'menu_image_'.Carbon::now()->format('ymdhis').'.'.$ext; //nama ketika berhasil disimpan.
            $gambar->storeAs($path, $nama); //proses menyimpan dengan path dan nama yang sudah dideklarasikan.
            $input['thumbnail'] = $nama; //nilai yang disimpan ke dalam database.
        }
        //simpan semua collection termasuk image ke database
        Menu::create($input);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dibuat');
    }

    public function detail($id)
    {
        $data = Menu::findOrFail($id);
        $kategori = Kategori::all();
        return view('menu.detail', compact('data','kategori'));
    }

}
