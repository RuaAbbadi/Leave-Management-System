@extends('layout.front')

@section('title', 'Create Employee')

@section('content')

<div class="row-4 mt-4">
    <div class="col-md-6 p-4 shadow-sm offset-3 bg-dark rounded ">
        @if($errors->any())
        <div class="alert alert-danger">
            Validation error!
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('employees.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control mb-3 w-75" />
                <input type="email" name="email" placeholder="Email" class="form-control mb-3 w-75" vlaue="{{old('email')}}" />
                <input type="password" name="password" placeholder="Password"  class="form-control mb-3 w-75" />

                <select name="gender" class="form-select mb-3 w-50">
                    <option vlaue="">Select Gender</option>
                    <option vlaue="male">Male</option>
                    <option vlaue="female">Female</option>
                </select>
                <select name="department" class="form-select mb-3 w-50">
                    <option vlaue="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->title}}</option>
                    @endforeach
                </select>
                <input type="text" name="phonenumber" placeholder="Phone Number" class="form-control mb-3 w-75" />
                <input type="text" name="address" placeholder="Address" class="form-control mb-3 w-75" />
                <select name="role" class="form-select mb-3 w-50">
                    <option vlaue="admin" @selected(old('role')=='admin')>Admin</option>
                    <option vlaue="employee" @selected(old('role')=='admin')>Employee</option>
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>


        </form>
    </div>
</div>


@endsection