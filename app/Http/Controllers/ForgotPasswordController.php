<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) return back()->with('error', 'Email not found.');

        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp]);

Mail::send('emails.otp', ['otp' => $otp, 'subject' => 'Your OTP Code'], function ($message) use ($user) {
    $message->to($user->email)->subject('Your OTP Code');
});


        session(['otp_email' => $user->email]);
        return redirect()->route('password.reset')->with('success', 'OTP sent to your email.');
    }

    public function showResetForm()
    {
        return view('auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', session('otp_email'))->first();

        if (!$user || $user->otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
        ]);

        session()->forget('otp_email');
        return redirect()->route('login.form')->with('success', 'Password reset successful.');
    }
}
