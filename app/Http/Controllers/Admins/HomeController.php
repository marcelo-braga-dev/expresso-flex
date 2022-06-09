<?php

namespace App\Http\Controllers\Admins;

class HomeController
{
    public function index()
    {
        return view('pages.admins.home');
    }
}
