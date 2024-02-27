<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $condidates = Auth::user();
        $experiences = Experience::where('user_id',$condidates->id)->get();
        $Skills=$condidates->Skills;
        return view('condidates.condidate', compact('condidates', 'experiences','Skills'));
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
        update($request->validated());
        if ($request->hasFile('image')) {
            $condidate->clearMediaCollection('user');
            $condidate->addMediaFromRequest('image')->toMediaCollection('user');
        }

        return view('condidates.condidate', compact('condidate'));
    }
}
