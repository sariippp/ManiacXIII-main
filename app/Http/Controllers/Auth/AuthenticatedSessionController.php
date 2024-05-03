<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        //print_r($request->all());
        $request->validate([
            'username' => ['required', 'min:8', 'max:25'],
            'password' => ['required']
        ]);
        $request->authenticate();

        $request->session()->regenerate();

        $this->authenticated($request, Auth::user());

        switch (Auth::user()->role) {
            case 'participant':
                return redirect()->intended('/team');
                break;
            case 'acara':
                return redirect()->intended('/acara');
            case 'admin':
                return redirect()->intended('/admin');
        }

        abort(404);
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

    // Untuk login cuma bisa 1 user
    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices($request['password']);
    }
}
