<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function menu()
    {
        return view('layouts/menu');
    }

    public function index()
    {
        return view('home/index');
    }

    public function booking()
    {
        return view('home/booking');
    }

    public function doctor()
    {
        return view('home/doctor');
    }

    public function detailDoctor()
    {
        return view('home/detail-doctor');
    }

    public function news()
    {
        return view('home/news');
    }

    public function contact()
    {
        return view('home/contact');
    }
}
