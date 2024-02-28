<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $companies = Company::all();
        return view('auth.register', compact('companies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'fullname' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'address' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'string'],
        //     'role_id' => ['required', 'exists:roles,id'],
        // ]);
        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);
        if ($request->hasFile('image')) {
            $user->addMedia($request->file('image'))->toMediaCollection('user');
        }
        if ($request->role_id == 4) {
            $user->status = 0;
            $company = Company::create([
                'name' => $request->name,
                'localisation' => $request->localisation,
                'description' => $request->description,
            ]);

            if ($request->hasFile('logo')) {
                $company->addMedia($request->file('logo'))->toMediaCollection('company');
            }

            $user->company()->associate($company);

            $user->save();
            event(new Registered($user));
            return redirect()->route('login');
        }

        if ($request->role_id == 3) {
            $user->company_id = $request->company_id;
            $user->status = 0;
            $user->save();
            event(new Registered($user));

            return redirect()->route('login');
        }
        event(new Registered($user));

        return redirect()->route('login');
    }
}
