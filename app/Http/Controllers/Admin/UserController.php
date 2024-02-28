<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.Dashadmin',compact('users'));
    }

    public function Show()
    {
        $user=Auth::user();
        $user = User::paginate(10);

        return view('admin.Dashadmin', compact('user'));
    }


    public function createUser()
    {
        return view('admin.users.create');
    }


    public function storeUser(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.Update', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {


        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }


    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }


}
