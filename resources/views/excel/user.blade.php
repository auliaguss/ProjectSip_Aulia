<h1>User List</h1>
<br/>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>User ID</th>
        <th>Roles ID</th>
      </tr>
    </thead>
    <tbody>  
  @foreach($user as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{$user->id}}</td>
      <td>{{$user->role_id}}</td>
    </tr>
  @endforeach


  </tbody>
</table>