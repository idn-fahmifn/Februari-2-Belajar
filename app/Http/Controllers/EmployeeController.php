<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $data = 'saya sebagai engineer';
        return view('halaman.employee', compact('data'));
    }
}
