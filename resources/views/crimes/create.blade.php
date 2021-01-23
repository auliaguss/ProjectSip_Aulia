@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Crime</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('crimes.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('crimes.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="case_name" class="form-control" placeholder="Name" value="{{ old('case_name') }}">
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Location:</strong>
		            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location') }}">
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
                        value="{{ old('start_date') }}"/>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>User ID:</strong>
		            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" >
                        @foreach($usr as $usr)
                          <option value="{{$usr->id}}" {{ old('user_id')=="$usr->id"?'selected':""}}>{{$usr->id}} - {{$usr->name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Status:</strong>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" >
                        <option value="Finished" {{old('status')=="Finished"?'selected':""}}>Finished</option>
                        <option value="Unfinished" {{old('status')=="Unfinished"?'selected':""}}>Unfinished</option>
                    </select>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>File:</strong>
                    <input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        <img src="images/{{ Session::get('photo') }}">
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  

    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection