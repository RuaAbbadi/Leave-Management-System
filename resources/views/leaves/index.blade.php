@extends('layout.front')

@section('title', 'Leaves')

@section('content')
<div class="mt-4">
    @if(!empty($status))
    <div class=" alert alert-success">
        {{$status}}
    </div>
    @endif
    <a class=" mt-5 w-25 btn btn-success ms-5" href="{{route('leaves.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-3 mb-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Create Leave</a>
    <table class="table table-striped mt-5 py-5">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">From Date</th>
                <th scope="col">To Date</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                @if($leaves)
                @foreach($leaves as $leave)
                <th scope="row">{{$leave->id}}</th>
                <td>{{$leave->start_date}}</td>
                <td>{{$leave->end_date}}</td>
                <td>{{$leave->description}}</td>
                <td>
                    @if($leave->leavestatus=='1') Applied @endif
                    @if($leave->leavestatus=='2') Approved @endif
                    @if($leave->leavestatus=='3') Rejected @endif
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                        @can('update',$leave)
                            <a href="{{route('leaves.edit', $leave->id)}}" class="btn btn-primary w-75">Edit</a>
                        @endcan
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('leaves.destroy',$leave->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type='submit' class="btn btn-danger">Delete Leave</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <script>
        function update_leave_status(id, selected_value) {
            window.location.href = 'leaves/' + id + '&type=update&status=' + selected_valu;
        }
    </script>

    @endsection