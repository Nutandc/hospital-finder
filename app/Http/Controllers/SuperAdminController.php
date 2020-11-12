<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }
    public function index()
    {
        return view('superadmin.saindex');
    }
    public function addAdmin()
    {
        $users = User::where('role', 'LIKE', '2')->get();
        return view('superadmin.addadmin', compact('users'));
    }
    public function editAdmin(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('superadmin.editadmin')->with('users', $users);
    }
    public function updateAdmin(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        return redirect('/adminrole-register')->with('status', 'Your data is updated');
    }
    public function activeAdmin(Request $request, $id)
    {
        $users = User::find($id);
        if($users->active){
            $users->active = 0;
        }
        else{
            $users->active = 1;
        }
        $users->update();
        return redirect('/adminrole-register')->with('status', 'Your data is updated');
    }
    public function deleteAdmin(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/adminrole-register')->with('status', 'Your data is deleted successfully');
    }
    public function superaddsadmin(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '2',
            'password' => bcrypt($request->password),
        ]);
        return redirect('/adminrole-register')->with('status', 'Admin created successfully');
    }
}
