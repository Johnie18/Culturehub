@extends('auth.layout')

@section('content')
<h4 class="mb-3 text-center">Register</h4>
<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" name="name" id="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <div class="mb-3">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
  </div>
  <button class="btn btn-primary w-100">Register</button>
  <div class="text-center mt-3">
    <a href="{{ route('login.form') }}">Already have an account? Login</a>
  </div>
</form>
@endsection
