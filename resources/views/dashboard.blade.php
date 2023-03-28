<x-app-layout>
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
          
        </div>
        <br><br>
        <div class="w3-container">
          <p><a href="/">GO BACK TO HOME PAGE</a></p>
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->name }}</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->username }}</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->email }}</p>
          <p>
            <form method="POST" action="{{ route('logout') }}" x-data>
              @csrf
              <x-dropdown-link href="{{ route('logout') }}"
              @click.prevent="$root.submit();">
              {{ __('Log Out') }}
              </x-dropdown-link>
            </form></p>
            <hr>
            
            <br>
          </div>
        </div><br>
        <!-- End Left Column -->
      </div>
      <!-- Right Column -->
      <div class="w3-twothird">
        
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>All Comments</h2>
          <div class="w3-container">
            <h5 class="w3-opacity"><b>Front End Developer / w3schools.com</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Like workshops</span></h6>
            <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
            <hr>
          </div>
        </div>
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Like/Dislike</h2>
          <div class="w3-container">
            <h5 class="w3-opacity"><b>Front End Developer / w3schools.com</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Like workshops</span></h6>
            <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
            <hr>
          </div>
        </div>
        <!-- End Right Column -->
      </div>
      
      <!-- End Grid -->
    </div>
    
    <!-- End Page Container -->
  </div>
</body>
</html>

</x-app-layout>