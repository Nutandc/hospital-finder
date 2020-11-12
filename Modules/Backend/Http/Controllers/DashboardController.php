<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend::dashboard.index');
    }

}
