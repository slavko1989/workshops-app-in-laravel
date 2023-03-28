
@include('admin.head')
@include('admin.nav')
@include('admin.main')
<div class="container mt-3">
  <h2>User Table</h2>
  @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <form class="form-control" method="post" action="{{ url('admin/edit_user/'.$users->id) }}" enctype="multipart/form-data">
   @csrf
        <input type="hidden" name="name" value="{{ $users->id }}"><br>
        <input type="text" name="name" value="{{ $users->name }}"><br>
        <input type="text" name="username" value="{{ $users->username }}"><br>
        <input type="text" name="email" value="{{ $users->email }}"><br>
        <input type="text" name="phone" value="{{ $users->phone }}"><br>
        <input type="file" name="photo" value="{{ $users->photo }}"><br>
        <img src="{{ asset('../users_img/' . $users->photo) }}" style="width: 80px;height: 80px"><br><br>
        <select name="status">
          <option>Choose activity</option>
          <option value="{{ $users->status=1 }}">Deactive</option>
          <option value="{{ $users->status=0 }}">Active</option>

        </select><br>
        <input type="submit" name="submit" value="Update users"><br>


    
    </form>
</div>
@include('admin.footer')