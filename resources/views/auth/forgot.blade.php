@extends('auth.layout')

@section('content')
<h4 class="mb-3 text-center">Forgot Password</h4>
<form method="POST" action="{{ route('password.email') }}">
  @csrf
  <div class="mb-3">
    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
  </div>
  <button class="btn btn-primary w-100">Send OTP</button>
  <div class="text-center mt-3">
    <a href="{{ route('login.form') }}">Back to Login</a>
  </div>
</form>
@endsection
