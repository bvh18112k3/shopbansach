<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number'=>['required', 'string', 'max:10', 'unique:'.User::class],
            'address'=>['required', 'string'],
            'role'=>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = new User();
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'role'=>$request->role,
            'image'=>$request->image,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('image')) {
            $user->image = upload_file('user', $request->file('image'));
        }else{
            $user->image = 'storage/user/noavatar.png';
        }
        $user->save();

        event(new Registered($user));

        Auth::login($user);
        if(Auth::user()->role === 'Admin'){
            return redirect(RouteServiceProvider::ADMIN);
        }else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
