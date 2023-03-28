
@include('admin.head')
@include('admin.nav')
@include('admin.main')
<div class="container mt-3">
  <h2>User Table</h2>
  @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user as $users)
      <tr>
        <td>{{ $users->name }}</td>
        <td>{{ $users->username }}</td>
        <td>{{ $users->email }}</td>
        <td>{{ $users->phone }}</td>
        <td><img src="{{ asset('../users_img/' . $users->photo) }}" style="width: 80px;height: 80px;"></td>
        <td>
          @if($users->status=='0')

          <i class="fa fa-check"> Active</i>
          @elseif($users->status=='1')

          <i class="fa fa-ban"> Baned</i>

        
        @endif
      </td>
        <td><a href="{{ url('admin/edit_user/'. $users->id) }}">EDIT</a> | <a href="">DELETE</a></td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>
@include('admin.footer')