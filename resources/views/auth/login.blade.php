@extends('layout')
@section('content')
<h2>Login</h2>
@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="/login">
  @csrf
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button class="btn btn-primary">Login</button>
</form>
@endsection