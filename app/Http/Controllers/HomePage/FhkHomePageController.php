<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Admin\FHK;
use Illuminate\Http\Request;

class FhkHomePageController extends Controller
{
    public function index()
    {
        $fhk = FHK::all();
        return view('home-page.fhk', ['fhk' => $fhk]);
    }
}
