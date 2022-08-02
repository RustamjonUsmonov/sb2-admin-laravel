<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profileIndex()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function profileUpdate(User $user, UpdateProfileRequest $request)
    {
        $user->update($request->validated());
        return redirect()->back()->with(['message' => 'Successfully updated']);
    }

    public function passwordIndex()
    {
        return view('profile.password');
    }

    protected function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        $user = Auth::user();

        $user->password = Hash::make($validated['password']);
        $user->setRememberToken(Str::random(60));
        $user->save();

        $this->guard()->login($user);
        return redirect()->route('home')->with(['message' => 'Successfully updated']);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
