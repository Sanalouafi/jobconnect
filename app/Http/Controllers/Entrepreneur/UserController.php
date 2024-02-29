<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user=auth()->user();
        $publications=Publication::where("company_id",$user->company_id)->get();
        return view("entrepreneur.index",compact("user","publications"));
    }
}
