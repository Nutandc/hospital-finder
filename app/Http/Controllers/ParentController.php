<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('parent');
    }
    public function index()
    {
        return view('parent');
    }
}
