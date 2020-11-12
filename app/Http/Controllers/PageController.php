<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $h = \request()->get('q');
        $searchResults = DB::table('hospitals')
            ->select('id', 'name', 'location', 'opening_hour', 'image')
            ->when($h, function ($query) use ($h) {
                $query->orWhere('name', 'like', '%' . $h . '%')
                    ->orWhere('address', 'like', '%' . $h . '%')
                    ->orWhere('detail', 'like', '%' . $h . '%');
            })->get();
        $hospitals = DB::table('hospitals')
            ->select('id', 'name', 'location', 'opening_hour', 'image')
            ->take(4)
            ->get();
        return view('welcome', compact('searchResults', 'hospitals'));
    }

    public function contact()
    {
        return view('contact');
    }
}
