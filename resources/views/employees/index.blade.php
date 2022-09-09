@extends('layout.front')

@section('title', 'Employees')

@section('content')
<div class="mt-4">
    @if(!empty($status))
    <div class=" alert alert-success">
        {{$status}}
    </div>
    @endif
    <a class=" mt-5 w-25 btn btn-success" href="{{route('employees.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-3 mb-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg> Create Employee</a>
    <table class="table table-striped mt-5">
        <thead class="text-center">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Position</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                @if($employees)
                @foreach($employees as $employee)
                <th scope="row">{{$employee->name}}</th>
                <td>{{$employee->email}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->role}}</td>
                <td><a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a></td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    @endsection