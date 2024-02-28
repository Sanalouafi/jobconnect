<?php

namespace App\Http\Controllers\Representative;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $representative = Auth::user();
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'Entrepreneur');
        })
            ->where('status', 0)
            ->where('company_id', $representative->company_id)
            ->get();

        return view('representative.index', compact('users'));
    }
    public function edit()
    {
        $user = Auth::user();
        $experiences = Experience::where('user_id', $user->id)->get();

        return view('representative.update', compact('user', 'experiences'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = Auth::user();

        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;

        if ($request->hasFile('image')) {
            $user->clearMediaCollection('user');
            $user->addMedia($request->file('image'))->toMediaCollection('user');
        }

        $user->save();

        return redirect()->route('representative.index')->with('success', 'Profile updated successfully.');
    }
    public function changeStatus(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 1;
        $user->save();
        return back()->with('success', 'User status changed successfully.');
    }

}
