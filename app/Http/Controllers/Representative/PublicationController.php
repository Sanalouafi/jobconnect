<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Models\Company;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PublicationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $company = Company::where("id", $user->company_id)->first();
        $publications = Publication::orderBy('created_at', 'desc')->take(3)->get();
        $allPublications = Publication::orderBy('created_at', 'desc')->get();
        return view('representative.publication.index', compact('publications', 'company', 'user', 'allPublications'));
    }

    public function store(PublicationStoreRequest $request)
    {
        $publication = Publication::create($request->validated());
        if ($request->hasFile('media')) {
            $publication->addMediaFromRequest('media')->toMediaCollection('publication');
        }
        return redirect()->back()->with('success', 'Publication created successfully.');
    }
    public function show(Publication $publication)
    {
    }

    public function update(PublicationUpdateRequest $request)
    {
        $publication = Publication::where('id', $request->input('id'))
            ->where('company_id', $request->input('company_id'))->first();
        $publication->update($request->validated());

        if ($request->hasFile('media')) {
            $publication->clearMediaCollection('publication');
            $publication->addMediaFromRequest('media')->toMediaCollection('publication');
        }
        return redirect()->back()->with('success', 'Publication updated successfully.');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $publications = Publication::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get();

        return view('representative.publication.index', compact('publications', 'keyword'));
    }




}
