<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class OtpVerificationController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $user = User::where('email', session('otp_email'))->first();

        if (!$user || $user->otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        $user->update(['is_verified' => true, 'otp' => null]);
        session()->forget('otp_email');

        return redirect()->route('login.form')->with('success', 'Email verified! You can now login.');
    }

    public function resendOtp()
    {
        $email = session('otp_email');
        if (!$email) return redirect()->route('register.form');

        $user = User::where('email', $email)->first();
        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp]);

Mail::send('emails.otp', ['otp' => $otp, 'subject' => 'Your OTP Code'], function ($message) use ($user) {
    $message->to($user->email)->subject('Your OTP Code');
});


        return back()->with('success', 'New OTP sent to your email.');
    }
}
