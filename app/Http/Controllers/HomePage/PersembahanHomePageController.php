<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Admin\Persembahan;
use Illuminate\Http\Request;

class PersembahanHomePageController extends Controller
{
    public function index()
    {
        // Ambil hanya persembahan yang is_featured = 1 (aktif)
        $persembahan = Persembahan::where('is_featured', 1)->get();
        return view('home-page.persembahan-pelayanan', ['persembahan' => $persembahan]);
    }
}

