@extends('layouts.app')


@section('content')
    
<div class="mx-auto" style="width: 300px;">
    <h2 class="mx-auto">Crimes Management</h2>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
    
                @can('crime-create')        
                <button class="btn btn-primary delete_all" data-url="{{ url('crimesDeleteAll') }}">Delete All Selected</button>
                <a class="btn btn-success" href="{{ route('crimes.create') }}"> Create New Crime</a>
                @endcan
            </div>
            <div class="pull-right">
            
                <div class="duo-link">
                    <a href="/crime/export_excel" class="btn tambah" target="_blank">EXPORT</a>
                    <button type="button" class="btn export" data-toggle="modal" data-target="#importExcel">
                        IMPORT
                    </button>
                </div>
                
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped">
        <tr>
            @can('crime-delete')
            <th width="50px"><input type="checkbox" id="master"></th>
            @endcan
            <th width="80px">No</th>
            <th>Image</th>
            <th>Name</th>
            <th>User ID</th>
            <th>Start Date</th>
            <th>Status
            
            @can('crime-delete')
                <a href="/crimes/filter/finished">✔️</a>
                <a href="/crimes/filter/unfinished" >❌</a>
            @endcan

            </th>
            <th width="100px">Action</th>
        </tr>
        @if($crimes->count())
            @foreach($crimes as $key => $crime)
                <tr id="tr_{{$crime->id}}">
                    @can('crime-delete')
                        <td><input type="checkbox" class="sub_chk" data-id="{{$crime->id}}"></td>
                    @endcan
                    <td>{{ ++$key }}</td>
        	        <td><img src="{{ asset($crime->photo)}}" class="foto" width="120px"/></td>
                    <td>{{ $crime->case_name }}</td>
        	        <td>{{ $crime->user_id }}</td>
                    <td>{{ $crime->start_date }}</td>
                    <td>{{ $crime->status }}</td>
                    <td>
                    
                        @can('crime-delete')
                         <a href="{{ url('crimes',$crime->id) }}" class="btn btn-danger btn-sm"
                           data-tr="tr_{{$crime->id}}"
                           data-toggle="confirmation"
                           data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                           data-btn-ok-class="btn btn-sm btn-danger"
                           data-btn-cancel-label="Cancel"
                           data-btn-cancel-icon="fa fa-chevron-circle-left"
                           data-btn-cancel-class="btn btn-sm btn-default"
                           data-title="Are you sure you want to delete ?"
                           data-placement="left" data-singleton="true">
                            Delete
                        </a>
                        @endcan
                        
                        <a class="btn btn-info" href="{{ route('crimes.show',$crime->id) }}">Show</a>
                        @can('crime-edit')
                        <a class="btn btn-primary" href="{{ route('crimes.edit',$crime->id) }}">Edit</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
{!! $crimes->render() !!}
</div> 


		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/crime/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</body>




@endsection