<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $otp = rand(100000, 999999);

        $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
        ]);

        // Send OTP
Mail::send('emails.otp', ['otp' => $otp, 'subject' => 'Your OTP Code'], function ($message) use ($user) {
    $message->to($user->email)->subject('Your OTP Code');
});


        session(['otp_email' => $user->email]);
        return redirect()->route('otp.form')->with('success', 'OTP sent to your email.');
    }
}
