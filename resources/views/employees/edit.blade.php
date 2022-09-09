@extends('layout.front')

@section('title', 'Edit Employee')

@section('content')
<div class="mt-3">
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
</div>
<div class="row ms-4 py-5">
    <div class="col-md-6  pb-5 ms-3">
        <div class="d-flex mb-4 justifiy-content-between">
            <div>
                <h2>Edit Employee</h2>
            </div>
            <form action="{{route('employees.destroy',$employees->id)}}" method="post">
                @csrf
                @method('delete')
                <button type='submit' class="btn btn-danger ms-5">Delete Employee</button>
            </form>
        </div>
        <form action="{{route('employees.update',$employees->id)}}" method="post">
            @csrf
            {{--Form method spoofing--}}
            @method('put')
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control mb-3 w-75"  value="{{old('name',$employees->name)}}" />
                <input type="email" name="email" placeholder="Email" class="form-control mb-3 w-75" value="{{old('email',$employees->email)}}" />
                <input type="password" name="password" class="form-control mb-3 w-75"  value="{{old('password',$employees->password)}}" />

                <select name="gender" class="form-select  mb-3 w-50">
                    <option vlaue="Male" @if($employees->gender=='Male')selected @endif>Male</option>
                    <option vlaue="Female" @if($employees->gender=='Female')selected @endif>Female</option>
                </select>

                <select name="department" class="form-select mb-3 w-50">
                   @foreach($departments as $departments)
                    <option @if($departments->id==$employees->department_id) selected @endif value="{{$departments->id}}">{{$departments->title}}</option>
                    @endforeach
                </select>

                <input type="text" name="phonenumber" placeholder="Phone Number" class="form-control mb-3 w-75" value="{{old('phonenumber',$employees->phonenumber)}}"/>
                <input type="text" name="address" placeholder="Address" class="form-control mb-3 w-75" value="{{old('address',$employees->address)}}"/>

                <select name="role" class="form-select">
                    <option vlaue="admin" @if($employees->role=='admin')selected @endif>Admin</option>
                    <option vlaue="employee" @if($employees->role=='employee')selected @endif>Employee</option>
                </select>
            </div>
            <div class="col-md-6 text-start">
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </div>
</div>


@endsection