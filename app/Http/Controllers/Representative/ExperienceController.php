<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(ExperienceStoreRequest $request)
    {
        $experience = Experience::create($request->validated());
        return redirect()->back()->with('success', 'experience created successfully.');
    }
    public function update(ExperienceUpdateRequest $request)
    {
        $experience = Experience::where('id', $request->input('id'))
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $experience->update($request->validated());

        return redirect()->back()->with('success', 'Experience updated successfully.');
    }


    public function destroy(Request $request)
    {
        $experience = Experience::where('id', $request->input('id'))
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $experience->delete();

        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }

}
