@extends('layout.front')

@section('title', 'Create Leaves')

@section('content')

<div class="row mt-4 py-5 ms-5">
    <div class="col-md-6 ">
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
        <h2 class="mb-5">Apply For a Leave</h2>
        <form action="{{route('leaves.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <select name="leavetype" class="form-select mb-3 w-50">
                    <option vlaue="">Select Leave  Type</option>
                    @foreach($leavestype as $leavestype)
                    <option value="{{$leavestype->id}}">{{$leavestype->name}}</option>
                    @endforeach
                </select>
                <input type="date" name="start_date" class="form-control mb-3 w-75" />
                <input type="date" name="end_date" class="form-control mb-3 w-75" />
                <textarea name="description" rows="3" class="form-control">{{old('description')}}</textarea>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</div>


@endsection