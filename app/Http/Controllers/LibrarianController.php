<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('librarian');
    }
    public function index()
    {
        return view('librarian');
    }
}
