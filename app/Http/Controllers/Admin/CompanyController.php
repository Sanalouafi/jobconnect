<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('admin.dashadmin', compact('companies'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->all());
        $company->addMediaFromRequest('logo')->toMediaCollection('logos');

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show()
    {
        $companies = Company::all();

        return view('admin.dashadmin', compact('companies'));
    }

    public function edit(Company $company)
    {
        return view('admin.companies.update', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());
        if ($request->hasFile('logo')) {
            $company->clearMediaCollection('logos');
            $company->addMediaFromRequest('logo')->toMediaCollection('logos');
        }

        return redirect()->route('admin.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.index')->with('success', 'Company deleted successfully.');
    }
}
