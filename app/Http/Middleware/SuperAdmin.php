<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class SuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 1) {
            return $next($request);
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('admin');
        }

        if (Auth::user()->role == 3) {
            return redirect()->route('student');
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('teacher');
        }

        if (Auth::user()->role == 5) {
            return redirect()->route('parent');
        }

        if (Auth::user()->role == 6) {
            return redirect()->route('librarian');
        }

        if (Auth::user()->role == 7) {
            return redirect()->route('accountant');
        }
    }
}
