	<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="{{ asset('../users_img/' . Auth::user()->photo) }}" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>
      					@if(Route::has('login'))
  						@auth
  						{{ Auth::user()->name }}
              <a href="{{ url('home/logout') }}" class="w3-bar-item w3-button">Logout</a>

						@endauth
						@endif
					</strong>
		</span><br>
    
    </div>
  </div>
  <hr>