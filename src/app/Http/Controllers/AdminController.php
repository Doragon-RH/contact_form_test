<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function search()
    {
        return view('search');
    }

    public function reset()
    {
        return view('reset');
    }

    public function delete()
    {
        return view('delete');
    }
}
