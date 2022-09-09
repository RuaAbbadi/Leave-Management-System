@extends('layout.front')

@section('title', 'Departments')

@section('content')
<div class="mt-4">
    @if(!empty($status))
    <div class=" alert alert-success">
        {{$status}}
    </div>
    @endif
    <a class=" mt-5 w-25 mt-4 btn btn-success ms-5" href="{{route('departments.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-3 mb-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Create Department</a>
    <div class="row mb-2 ms-4">
        @foreach($departments as $department)
        <div class="col-md-6 mt-5">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250  position-relative">
                <div class="col-md-4 p-4 d-flex flex-column position-static">
                    <h3 class="mb-0 ">{{$department->title}}</h3>
                </div>
                <div class="col-md-6 p-4 ms-5 d-flex flex-column position-static">
                    <a href="{{route('departments.edit', $department->id)}}" class="btn btn-primary w-100">Edit Department</a>
                    <form action="{{route('departments.destroy',$department->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type='submit' class="btn btn-danger mt-5 w-100">Delete Department</button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
        <div>

            @endsection