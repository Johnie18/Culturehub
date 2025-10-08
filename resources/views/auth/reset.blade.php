@extends('auth.layout')

@section('content')
<h4 class="mb-3 text-center">Reset Password</h4>
<form method="POST" action="{{ route('password.update') }}">
  @csrf
  <div class="mb-3">
    <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="New Password" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
  </div>
  <button class="btn btn-success w-100">Reset Password</button>
</form>
@endsection
