<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferStoreRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $user= auth()->user();
        $offers = Offer::all();
        return view('entrepreneur.offers.index', compact('offers','user'));
    }
    public function store(OfferStoreRequest $request)
    {
        $validatedData = $request->validated();
        $offer = Offer::create($validatedData);

        if ($request->hasFile('media')) {
            $offer->addMediaFromRequest('media')->toMediaCollection('offer');
        }

        return redirect()->back()->with('success', 'Offer created successfully.');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('entrepreneur.offers.edit', compact('offer'));
    }
    public function update(OfferStoreRequest $request, $id)
    {
        $offer = offer::where('id', $request->input('id'))
            ->where('company_id', $request->input('company_id'))->first();
        $offer->update($request->validated());

        if ($request->hasFile('media')) {
            $offer->clearMediaCollection('offer');
            $offer->addMediaFromRequest('media')->toMediaCollection('offer');
        }
        return redirect()->back()->with('success', 'offer updated successfully.');
    }

}
