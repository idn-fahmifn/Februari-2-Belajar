<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $data = 'saya sebagai engineer';
        $b = 'test';
        $c = 'test';
        $d = 'test';
        $e = 'test';
        return view('halaman.employee', compact('data', 'c'));
    }
}
