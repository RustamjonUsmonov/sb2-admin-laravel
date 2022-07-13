<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
