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
          <img src="{{ asset('../users_img/' . Auth::user()->photo) }}" style="width: 150px;height: 150px;">
        </div>
        <br><br>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->name }}</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->username }}</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ Auth::user()->email }}</p>
         <p><a href=""><span class="glyphicon glyphicon-trash"></span></a> | <a href="{{ url('users/edit_user/'. Auth::user()->id) }}"><span class="glyphicon glyphicon-wrench"></span></a></p>
            <hr>
          <a href="{{ url('users/change_pass') }}"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Change password</a>

            <br>
          </div>
        </div><br>
        <!-- End Left Column -->
      </div>
       @if(session()->has('message'))
          <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
         @endif
         @if(session()->has('mess'))
          <p style="color: red;font-weight: bolder;">{{ session()->get('mess') }}</p>
         @endif
      <!-- Right Column -->
      <div class="w3-twothird">
        
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>All Comments</h2>
          <div class="w3-container">
            @forelse($comm as $comm)
            <p>{{ $comm->title }}</p>
            <p style="color:red;font-weight: bolder;">{{ $comm->comm }}<a href="{{ url('users/user_panel/'.$comm->id) }}"><br> <strong style="color: black;" class="btn btn-danger">Delete</strong></a></p>
            
            @empty
            {{ 'no comments yet' }}
            @endforelse
            <hr>
          </div>
        </div>
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Like/Dislike</h2>
          <div class="w3-container">
            <p>
              @foreach($like as $like)
                  <h1>{{ $like->title }} <a href="" class="btn btn-danger">Delete</a></h1>

              @endforeach
            </p>
            <hr>
          </div>
        </div>

        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>People who wants to see your organisation</h2>
          <div class="w3-container">
            <p>
           
            </p>
            <hr>
          </div>
        </div>

          <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>You want to visit this project</h2>
          <div class="w3-container">
            <h5 class="w3-opacity"><b>You signup in this organisations</b></h5>
            @foreach($show as $show)
            <h6 class="w3-text-teal">{{ $show->title }}</h6>
            <p>{{ $show->address }} / {{ $show->begin_at }} / 

              @if($show->confirm == 0)
              <p style="color: red;">Panding</p>
              @elseif($show->confirm == 1)
              <p style="color: violet;">Confirmed</p>
              @endif

              <a href="{{ url('users/user_panel/'. $show->id) }}" class="btn btn-danger">cancel</a>
            </p>
            @endforeach
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

