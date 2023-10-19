<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Link to the git.
     */
    public function socialize(string $socialize): RedirectResponse
    {
        return Socialite::driver($socialize)->redirect();
    }

    /**
     * Link to the git.
     */
    public function socializeRedirect(string $socialize): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver($socialize)->user();

            // if the user exits, use that user and login
            $finduser = User::where('email', $user->getEmail())?->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }else{
                //user is not yet created, so create first
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'socialite_type' => $socialize,
                    'socialite_id'=> $user->getId(),
                    'password' => Hash::make(Str::random(24))
                ]);

                //login as the new user
                Auth::login($newUser, true);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
