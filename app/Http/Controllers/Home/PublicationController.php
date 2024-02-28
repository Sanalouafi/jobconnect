<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class PublicationController extends Controller
{

    public function index()
    {
        $publications = Publication::orderBy("created_at", "desc")->get();
        $representatives = User::whereIn('company_id', $publications->pluck('company_id'))->first();
        return view("welcome", compact("publications", "representatives"));
    }



}
