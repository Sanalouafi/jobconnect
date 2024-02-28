<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index()
    {

        $experiences = Auth::user();

        return view('condidates.condidate', compact('experiences'));
    }

    public function getExperienceByUser()
    {
        $id_user = auth()->id();
        // $experienceUser = Experience::where('user_id', $id_user)->get();

        return view('condidates.condidate', compact('experienceUser'));
    }

    public function create()
    {
        return view('condidates.create');
    }

    public function store(ExperienceStoreRequest $request)
    {
        Experience::create($request->validated());

        return redirect()->route('condidates.index')->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('condidates.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('condidates.edit', compact('experience'));
    }

    public function update(ExperienceUpdateRequest $request, Experience $experience)
    {
        $experience->update($request->validated());

        return redirect()->route('condidates.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('condidates.index')->with('success', 'Experience deleted successfully.');
    }
}
