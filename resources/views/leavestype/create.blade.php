@extends('layout.front')

@section('title', 'Create Leaves Type')


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
<div class="row mt-5 py-4 ms-5">
    <h2 class="mb-4"> New Leave Type</h2>
    <div class="col-md-6 ">
        <form action="{{route('leavestype.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" value="{{old('name')}}"/> 
            <textarea name="description" rows="3" class="form-control mt-3">{{old('description')}}</textarea>
           </div>
         <div class="col-md-6 text-start">
           <button type="submit" class="btn btn-primary text-start mt-3">Create Leave Type</button>
        </div>
        </form>
    </div>
</div>


@endsection
