@extends('auth.layout')

@section('content')
<h4 class="mb-3 text-center">Verify OTP</h4>
<form method="POST" action="{{ route('otp.verify') }}">
  @csrf
  <div class="mb-3">
    <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
  </div>
  <button class="btn btn-success w-100">Verify</button>
</form>
<form method="POST" action="{{ route('otp.resend') }}" class="mt-3">
  @csrf
  <button class="btn btn-link w-100">Resend OTP</button>
</form>
@endsection
