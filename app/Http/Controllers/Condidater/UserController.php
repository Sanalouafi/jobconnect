<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $condidate = Auth::user();
        $experiences = Experience::where('user_id', $condidate->id)->get();
        // $Skills = $condidate->Skills;

        return view('condidates.condidate', compact('condidate', 'experiences'));
    }

    public function Show()
    {
        $condidate = Auth::user();

        return view('condidates.update', compact('condidate'));
    }

    public function edit()
    {
        return view('condidates.update');
    }

    public function update(UserUpdateRequest $request)
    {
        $condidate = Auth::user();
        $data = $request->all();

        if ($request->hasFile('user')) {
            $condidate->clearMediaCollection('user');
            $condidate->addMediaFromRequest('user')->toMediaCollection('user');
        }

        $condidate->update($data);

        return redirect()->route('condidate.index');
    }
}
