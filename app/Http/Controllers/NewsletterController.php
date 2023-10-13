<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(NewsLetter $newsletter)
    {
        ///ddd($newsletter);

        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This Email Cannot be Added',
            ]);
        }

        return redirect('/posts')->with('success', 'You Are Now Subscribed The NewsLetter');
    }
}
