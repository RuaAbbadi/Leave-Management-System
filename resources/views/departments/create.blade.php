@extends('layout.front')

@section('title', 'Create Department')

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
<div class="row mt-5 py-5 ms-5">
    <h2 class="mb-4"> New Department</h2>
    <div class="col-md-6 ">
        <form action="{{route('departments.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control" value="{{old('title')}}" />
            </div>
            <div class="col-md-6 text-start">
                <button type="submit" class="btn btn-primary text-start mt-3">Create Department</button>
            </div>
        </form>
    </div>
</div>


@endsection