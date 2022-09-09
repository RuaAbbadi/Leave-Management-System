@extends('layout.front')

@section('title', 'Edit Leaves')

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
                <h2>Edit Leave</h2>
            </div>
        </div>
        <form action="{{route('leaves.update',$leaves->id)}}" method="post">
            @csrf
            {{--Form method spoofing--}}
            @method('put')
            <div class="mb-3">
              
              <select class="text-center form-control" name="leavestatus">
                    <option value="">Update Status</option>
                    <option value="2"  @if($leaves->leavestatus==2)selected @endif>Approved</option>
                    <option value="3"  @if($leaves->leavestatus==3)selected @endif >Rejected</option>
                </select> 
            </div>
            <div class="col-md-6 text-start">
                <button type="submit" class="btn btn-primary">Update Leave</button>
            </div>
        </form>
    </div>
</div>


@endsection