<h1>User List</h1>
<br/>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Case Name</th>
        <th>Location</th>
        <th>User ID</th>
        <th>Start Date</th>
        <th>Status</th>
        <th>Detail</th>
      </tr>
    </thead>

    <tbody>  
  @foreach($crime as $crime)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $crime->case_name }}</td>
      <td>{{ $crime->location }}</td>
      <td>{{ $crime->user_id }}</td>
      <td>{{ $crime->start_date }}</td>
      <td>{{ $crime->status }}</td>
      <td>{{ $crime->detail }}</td>
    </tr>
  @endforeach


  </tbody>
</table>