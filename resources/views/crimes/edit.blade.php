@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('crimes.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('crimes.update',$crime->id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')
//patch

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Case Name:</strong>
		            <input type="text" name="case_name" value="{{ $crime->case_name }}" class="form-control" placeholder="Case Name">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Location:</strong>
		            <input type="text" name="location" value="{{ $crime->location }}" class="form-control" placeholder="Location">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Start Date:</strong>
                    <input type="text"
                       class="datepicker-here form-control"
                       name="start_date"
                       data-language='en'
                       data-multiple-dates="3"
                       data-multiple-dates-separator=", "
                       data-position='top left'
                        value="{{ $crime->start_date }}"/>
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>User ID:</strong>
		            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" >
                        @foreach($usr as $usr)
                          <option value="{{$usr->id}}" {{ $crime->user_id=="$usr->id"?'selected':""}}>{{$usr->id}} - {{$usr->name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Status:</strong>
		            <select class="form-control @error('status') is-invalid @enderror" name="status" >
                        <option value="Finished" {{$crime->status=="Finished"?'selected':""}}>Finished</option>
                        <option value="Unfinished" {{$crime->status=="Unfinished"?'selected':""}}>Unfinished</option>
                    </select>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Upload Photo ({{ $crime->photo }}) : </strong>
                    <input type="file" name="photo" class="form-control" value="{{ $crime->photo }}"/>
                    <img src="{{ URL::to('/') }}/{{ $crime->photo }}" width="100px"/>
                    <input type="hidden" name="hidden_image" value="{{ $crime->photo }}"/>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $crime->detail }}</textarea>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
