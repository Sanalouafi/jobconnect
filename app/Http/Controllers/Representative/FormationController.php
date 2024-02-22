<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{

    public function index()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }


    public function create()
    {
        return view('formations.create');
    }


    public function store(FormationStoreRequest $request)
    {
        Formation::create($request->validated());
        return redirect()->route('formations.index')->with('success', 'Formation created successfully.');
    }

    public function show(Formation $formation)
    {
        return view('formations.show', compact('formation'));
    }

    public function edit(Formation $formation)
    {
        return view('formations.edit', compact('formation'));
    }

    public function update(FormationUpdateRequest $request, Formation $formation)
    {
        $formation->update($request->validated());
        return redirect()->route('formations.index')->with('success', 'Formation updated successfully.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'Formation deleted successfully.');
    }
}
