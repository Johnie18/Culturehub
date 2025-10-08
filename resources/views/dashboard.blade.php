@extends('auth.layout')

@section('content')

  <p class="text-muted">You are successfully logged in!</p>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger mt-3">Logout</button>
  </form>
</div>
@endsection
