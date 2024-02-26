<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create');
    }


    public function store(ExperienceStoreRequest $request)
    {
        Experience::create($request->validated());
        return redirect()->route('experiences.index')->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }


    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    public function update(ExperienceUpdateRequest $request, Experience $experience)
    {
        $experience->update($request->validated());
        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully.');
    }
}
