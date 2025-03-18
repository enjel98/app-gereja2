<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Admin\PendampingFHK;
use Illuminate\Http\Request;

class PendampingFHKHomePageController extends Controller
{
    public function index()
    {
        $pendampingfhk = Pendampingfhk::all();
        return view('home-page.pendamping-fhk', ['pendampingfhk' => $pendampingfhk]);
    }
}
