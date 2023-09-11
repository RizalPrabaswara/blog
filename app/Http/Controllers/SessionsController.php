<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:7|max:255',
        ]);

        //check
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified',
            ]); //cara Lain

            // return back()
            //     ->withInput()
            //     ->withErrors([
            //         'email' => 'Your provided credentials could not be verified',
            //     ]);
        }
        session()->regenerate();

        return redirect('/posts')->with('success', 'you are Logging In !');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Anda Telah Logout');
    }
}
