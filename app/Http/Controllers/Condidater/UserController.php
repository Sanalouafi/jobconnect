<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        return view('condidates.condidate',compact('users'));
    }
}
