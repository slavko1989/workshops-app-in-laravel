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
          <form method="post" action="{{ url('users/change_pass') }}" class=".table-bordered">
            @csrf
          
          <input type="text" name="password"><br>
          <input type="text" name="new_password"><br>
          <input type="submit" name="submit" value="Update"><br>
        </form>
        </div>
        <br><br>
</body>
</html>

