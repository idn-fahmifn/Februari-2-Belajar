<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::paginate(10);
        return view('kategori.index', compact('data'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // rules mengisi form
        $request->validate([
            'nama_kategori' => 'string|min:3|max:20|required|unique:kategori',
            'thumbnail' => 'max:10240|required'
        ]);

        if($request->hasFile('thumbnail')){
            $gambar = $request->file('thumbnail'); //mengambil nilai atau file.
            $path = 'public/images/kategori'; //menentukan path penyimpanan.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension asli.
            $nama = 'kategori_image_'.Carbon::now()->format('ymdhis').'.'.$ext; //nama ketika berhasil disimpan.
            $gambar->storeAs($path, $nama); //proses menyimpan dengan path dan nama yang sudah dideklarasikan.
            $input['thumbnail'] = $nama; //nilai yang disimpan ke dalam database.
        }
        //simpan semua collection termasuk image ke database
        Kategori::create($input);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat');
    }
    public function detail($id)
    {
        $data = Kategori::findOrFail($id);
        $menu = Menu::where('id_kategori', $id)->get()->all();
        return view('kategori.detail', compact('data','menu'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Kategori::findOrFail($id); //mencari data yang akan diedit
        $request->validate([
            'nama_kategori' => 'string|min:3|max:20|required|unique:kategori',
            'thumbnail' => 'max:10240'
        ]); //rules atau aturan mengisi form

        if($request->hasFile('thumbnail')){
            $gambar = $request->file('thumbnail'); //mengambil nilai atau file.
            $path = 'public/images/kategori'; //menentukan path penyimpanan.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension asli.
            $nama = 'kategori_image_'.Carbon::now()->format('ymdhis').'.'.$ext; //nama ketika berhasil disimpan.
            $gambar->storeAs($path, $nama); //proses menyimpan dengan path dan nama yang sudah dideklarasikan.
            $input['thumbnail'] = $nama; //nilai yang disimpan ke dalam database.
        }
        $data->update($input); //edit berdasarkan row data yang dipilih
        return back()->with('success', 'Data berhasil diubah');
    }
    public function delete($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
