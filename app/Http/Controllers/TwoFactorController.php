<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Notifications\SendTwoFactorCode;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two_factor');
    }

    public function store(Request $request)
    {

        $request->validate([
            'two_factor_code' => ['integer', 'required'],
        ]);

        $user = auth()->user();
        if ($request->input('two_factor_code') !== $user->two_factor_code) {
            return redirect()->back()->withErrors(['two_factor_code' => "The code you entered doesn't match our records"]);
        }

        $user->resetTwoFactorCode();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function resend()
    {
        $user = auth()->user();
        try {
            $user->generateTwoFactorCode();
            $user->notify(new SendTwoFactorCode());

            Flash::success('Code has been sent again');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['two_factor_code' => 'An error occured. Please try again later']);
        }

        return redirect()->back();
    }
}
