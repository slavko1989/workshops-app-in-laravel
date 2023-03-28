
@include('admin.head')
@include('admin.nav')
@include('admin.main')
<div class="container mt-3">
  <h2>Comments Table</h2>
  @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image of user</th>
        <th>Image of workshop</th>
        <th>Comments</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $users)
      <tr>
        <td>{{ $users->name }}</td>
        <td>{{ $users->email }}</td>
        <td>{{ $users->phone }}</td>
        <td><img src="{{ asset('../users_img/' . $users->photo) }}" style="width: 80px;height: 80px;"></td>
        
          <td><img src="{{ asset('../arts_shops/' . $users->images) }}" style="width: 80px;height: 80px;"></td>
        <td>

       {{ $users->comm }}
      </td>
        <td><a href="{{ url('admin/comm/'.$users->id) }}" class="btn btn-danger">DELETE</a></td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>
@include('admin.footer')