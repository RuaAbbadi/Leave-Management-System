@extends('layout.front')

@section('title', 'change Password')
@section('content')
<div class="mt-5 ms-5">
  <form method="post" action="{{route('update_password')}}">
    @csrf
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
    <h1 class="h3 mb-4 fw-normal">Change Password</h1>
    <div class="form-floating">
      <input name="old_password" type="password" class="form-control mb-3" id="old_password" placeholder="Old Password">
      <label for="old_password">Password</label>
    </div>
    @error('old_password')
    <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="form-floating">
      <input name="new_password" type="password" class="form-control mb-3" id="new_password" placeholder="New password">
      <label for="new_password">New Password</label>
    </div>
    @error('new_password')
    <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="form-floating">
      <input name="new_password_confirmation" type="password" class="form-control mb-3" id="new_password_confirmation" placeholder="Confirm password">
      <label for="new_password_confirmation">Confirm Password</label>
    </div>

    <button class="w-50 btn btn-lg btn-primary" type="submit">Change Password</button>
  </form>
</div>


@endsection