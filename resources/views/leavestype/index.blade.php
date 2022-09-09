@extends('layout.front')

@section('title', 'Leaves Type')
@section('content')
<div class="mt-4">
    @if(!empty($status))
    <div class=" alert alert-success">
        {{$status}}
    </div>
    @endif
<a class=" mt-5 w-25 mt-4 ms-5 btn btn-success" href="{{route('leavestype.create')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-3 mb-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>Create Leave Type</a>
<div class="row mb-2 ms-4">
   @foreach($leavestype as $leavestype)
    <div class="col-md-6 mt-5">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-md-6 p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{$leavestype->name}}</h3> 
                <h6 class="mt-4">{{$leavestype->description}}</h6> 
            </div>
            <div class="col-md-6 p-4 d-flex flex-column position-static">
            <a href="{{route('leavestype.edit', $leavestype->id)}}" class="btn btn-primary w-75">Edit Leave Type</a>

            <form action="{{route('leavestype.destroy',$leavestype->id)}}" method="post">
                @csrf
                @method('delete')
                <button  type='submit' class="btn btn-danger mt-5 w-75">Delete Leave Type</button>
            </form>
            </div>
        </div>
    </div>
    @endforeach
<div>

@endsection