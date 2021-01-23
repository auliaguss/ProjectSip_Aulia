@extends('layouts.app')


@section('content')

<div class="mx-auto" style="width: 300px;">
    <h2 class="mx-auto">Users Management</h2>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
        <div class="pull-right">
		
            <div class="duo-link">
				<a href="/user/export_excel" class="btn tambah" target="_blank">EXPORT</a>
				<button type="button" class="btn export" data-toggle="modal" data-target="#importExcelU">
					IMPORT
				</button>
            </div>
        </div>
    </div>
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
 
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcelU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/user/import_excel" enctype="multipart/form-data">
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
 

<table class="table table-bordered table-striped">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Username</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>
    {{$user->role_id}}
      {{--  @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeachc
      @endif  --}}
    </td>
    <td>
       	<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       	<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
	   	<a href="{{ url('users',$user->id) }}" class="btn btn-danger btn-sm"
	   		data-tr="tr_{{$user->id}}"
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
        {{--  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}  --}}
    </td>
  </tr>
 @endforeach
</table>

{!! $data->render() !!}
{{--  {!! $data->render() !!}

<script type="text/javascript">
	        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
</script>  --}}
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection