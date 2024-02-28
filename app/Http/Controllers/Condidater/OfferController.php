<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
           
        $return=Offer::All();
        return view('condidates.Condidate');
    }


}
