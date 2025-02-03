<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan halaman home
    public function showdashboardform()
    {
        return view('home'); // Mengembalikan tampilan home.blade.php
    }
}
