<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
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

}
