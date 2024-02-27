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

}
