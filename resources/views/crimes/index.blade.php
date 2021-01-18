@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>crimes</h2>
            </div>
            <div class="pull-right">
                @can('crime-create')
                <a class="btn btn-success" href="{{ route('crimes.create') }}"> Create New Crime</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

{{auth()->user()->role_id}}
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Location</th>
            <th>User ID</th>
            <th>Start Date</th>
            <th>Status</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($crimes as $crime)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $crime->case_name }}</td>
	        <td>{{ $crime->location }}</td>
	        <td>{{ $crime->user_id }}</td>
	        <td>{{ $crime->start_date }}</td>
	        <td>{{ $crime->status }}</td>
	        <td>{{ $crime->detail }}</td>
	        <td>
                <form action="{{ route('crimes.destroy',$crime->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('crimes.show',$crime->id) }}">Show</a>
                    @can('crime-edit')
                    <a class="btn btn-primary" href="{{ route('crimes.edit',$crime->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('crime-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $crimes->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection