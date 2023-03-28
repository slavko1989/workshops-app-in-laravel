<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small">

  @if(Route::has('login'))
  @auth
  
  <a href="/" class="w3-bar-item w3-button">HOME</a>             
  <a href="{{ url('arts/arts_create') }}" class="w3-bar-item w3-button">Create your Workshops</a>
  <a href="{{ url('arts/arts_show') }}" class="w3-bar-item w3-button">View your Workshops</a>
  <a href="{{ url('users/user_panel') }}" class="w3-bar-item w3-button">PROFILE</a>
  &nbsp;&nbsp;&nbsp;&nbsp;Welcome - {{ Auth::user()->name }} <img src="{{ asset('../users_img/'. Auth::user()->photo) }}" alt="" class="rounded-circle" width="40" height="40">
    <a href="{{ url('home/logout') }}" class="w3-bar-item w3-button">Logout</a>


  @else
  <a href="/" class="w3-bar-item w3-button">HOME</a>
  <a href="{{ route('login') }}" class="w3-bar-item w3-button">SING IN</a>
  <a href="{{ route('register') }}" class="w3-bar-item w3-button">SING UP</a>

  @endauth
  @endif
  
  <a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"></i></a>
</div>
  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">