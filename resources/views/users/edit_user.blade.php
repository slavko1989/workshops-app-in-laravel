@include('section.head')
@include('section.nav')
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
  <!-- The Grid -->
  <div class="w3-row-padding">
    
    <!-- Left Column -->
    <div class="w3-third">
      
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          @if(session()->has('message'))
          <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
         @endif
          <form method="post" action="{{ url('users/edit_user/'.$user->id) }}" class=".table-bordered" enctype="multipart/form-data">
            @csrf
          <input type="file" name="photo" value="{{ $user->photo }}"><br>
          <img src="{{ asset('../users_img/' . Auth::user()->photo) }}" style="width: 80px;height: 80px;"><br><br>
          <input type="text" name="name" value="{{ $user->name }}"><br>
          <input type="text" name="email" value="{{ $user->email }}"><br>
          <input type="text" name="phone" value="{{ $user->phone }}"><br>
          <input type="text" name="username" value="{{ $user->username }}"><br>
          <input type="submit" name="submit" value="Update"><br>
        </form>




        </div>
        <br><br>
        
</body>
</html>

