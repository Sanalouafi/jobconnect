<?php

namespace App\Http\Controllers\Condidater;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    // public function index()
    // {

    //     $experiences = Auth::user();

    //     return view('condidates.condidate', compact('experiences'));
    // }

    // public function getExperienceByUser()
    // {
    //     $id_user = auth()->id();
    //     // $experienceUser = Experience::where('user_id', $id_user)->get();

    //     return view('condidates.condidate', compact('experienceUser'));
    // }

    public function create()
    {
        return view('experiences.create');
    }


public function store(ExperienceStoreRequest $request)
{
    $user = Auth::user();

    $experience = new Experience($request->validated());

    $user->experiences()->save($experience);

    return redirect()->route('condidate.index')->with('success', 'Experience created successfully.');
}


    public function show(Experience $experience)
    {
        return view('experiences.update', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('experiences.update', compact('experience'));
    }

    public function update(ExperienceUpdateRequest $request, Experience $experience)
    {
        $validatedData = $request->validated();

        $experience->update($validatedData);

        return redirect()->route('condidate.index')->with('success', 'Experience updated successfully.');
    }



    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('condidates.index')->with('success', 'Experience deleted successfully.');
    }
}
