<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        return view('publications.index', compact('publications'));
    }


    public function create()
    {
        return view('publications.create');
    }


    public function store(PublicationStoreRequest $request)
    {
        Publication::create($request->validated());
        return redirect()->route('publications.index')->with('success', 'Publication created successfully.');
    }


    public function show(Publication $publication)
    {
        return view('publications.show', compact('publication'));
    }


    public function edit(Publication $publication)
    {
        return view('publications.edit', compact('publication'));
    }

    public function update(PublicationUpdateRequest $request, Publication $publication)
    {
        $publication->update($request->validated());
        return redirect()->route('publications.index')->with('success', 'Publication updated successfully.');
    }

   
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }
}
