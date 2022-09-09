@extends('layout.front')

@section('title', 'Edit Leaves Type')

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
<div class="row">
    <div class="col-md-6 mt-5 py-5 ms-5">
        <div class="d-flex mb-4 justifiy-content-between">
            <div>
                <h2>Edit Leave Type</h2>
            </div>
            <form action="{{route('leavestype.destroy',$leavestype->id)}}" method="post">
                @csrf
                @method('delete')
                <button type='submit' class="btn btn-danger ms-5">Delete Leave Type</button>
            </form>
        </div>
        <form action="{{route('leavestype.update',$leavestype->id)}}" method="post">
            @csrf
            {{--Form method spoofing--}}
            @method('put')
            <div class="mb-3">
                <input type="text" name="name" class="form-control" value="{{old('name',$leavestype->name)}}" />
                <textarea name="description" rows="3" class="form-control mt-3">{{old('description',$leavestype->description)}}</textarea>
            </div>
            <div class="col-md-6 text-start">
                <button type="submit" class="btn btn-primary">Update Leave Type</button>
            </div>
        </form>
    </div>
</div>


@endsection