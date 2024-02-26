<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('condidates.condidate',compact('user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('condidates.condidate',compact('user'));
    }
    public function store()
    {
        $user = Auth::user();
        return view('condidates.condidate',compact('user'));
    }
}
