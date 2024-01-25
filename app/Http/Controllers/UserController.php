<?php

namespace App\Http\Controllers;

use App\Models\AboutInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index()
    {
        return Cache::remember('home_page', 60, function () {
            return view('welcome')->render();
        });
    }

    public function about()
    {
        return Cache::remember('about_page', 60, function () {
            $about_info = AboutInfo::latest()->get()[0];

            return view('about', compact('about_info'))->render();
        });
    }
}
