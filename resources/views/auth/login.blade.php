@extends('auth.layout')

@section('content')
<h4 class="mb-3 text-center">Login</h4>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <button class="btn btn-primary w-100">Login</button>
  <div class="text-center mt-3">
    <a href="{{ route('password.request') }}">Forgot Password?</a>
  </div>
  <div class="text-center mt-2">
    <a href="{{ route('register.form') }}">Create Account</a>
  </div>
</form>
@endsection
