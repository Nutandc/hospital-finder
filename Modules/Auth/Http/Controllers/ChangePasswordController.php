<?php

namespace Modules\Auth\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\URL;
use Modules\Auth\Http\Requests\ChangePasswordRequest;
use Nwidart\Modules\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        //$previousRoute = getPreviousRoute();
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();
        /*if ($previousRoute) {
            $routePrefix =$previousRoute->getAction('routePrefix');
            return redirect()->route($routePrefix . '.profile', ['#change-password'])
                ->with('success', 'Password changed successfully');
        }*/
        return redirect()->back()
            ->with('success', 'Password changed successfully');

    }
}
