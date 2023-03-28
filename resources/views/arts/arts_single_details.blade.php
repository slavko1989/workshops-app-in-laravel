@include('section.head')
@include('section.nav')
@include('section.header')
<!-- Grid -->
<div class="w3-row w3-padding w3-border">
    <!-- Blog entries -->
    <div class="w3-col l8 s12">
        <!-- Blog entry -->
        <div class="w3-container w3-white w3-margin w3-padding-large">
            <div class="w3-center">
                @if(session()->has('mess'))
                <p style="color: red;font-weight: bolder;">{{ session()->get('mess') }}</p>
              @endif
               @if(session()->has('message'))
                <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
              @endif
                <h3>{{ $art->title }}</h3>
                <h5><span class="w3-opacity">{{ $art->created_at }}</span></h5>
            </div>
            <div class="w3-justify">
                <img src="{{ asset('../arts_shops/'. $art->images) }}"  style="width:100%" class="w3-padding-16">
                <p><strong>Allowed seats - {{ $art->number }} </strong> {{ $art->begin_at }} / {{ $art->city }} / {{ $art->country }}</p>
                <p>{{ $art->text }}</p>
                
                <form method="post" action="{{ url('signups/'.$art->id) }}" name="form_for_signup">
                     @csrf
                    <input type="hidden" name="user_id">
                    <input type="hidden" name="art_id">
                    <input type="submit" name="submit" value="Sign up" class="w3-button w3-white w3-border"> 
                </form>
              
                  &nbsp;&nbsp;&nbsp;&nbsp; {{$count_like }}<a  class="btn" id="green" href="{{ url('liked/'.$art->id) }}"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></a>
                  {{$count_dislike }}<a class="btn" id="red" href="{{ url('disliked/'.$art->id) }}"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></a>
              
                <br><br>
            </div>
        </div>
    </div>
    @include('section.sidebar')
    
</div>
</div>
</nav>
<!-- Main Body -->
<section>
<div class="container">
<div class="row">
    <div class="col-sm-5 col-md-6 col-12 pb-4">
        <h1>Comments</h1>
        @if(session()->has('message'))
        <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
        @endif
        @forelse($art->comments as $comm)
        <div class="comment mt-4 text-justify">
            <img src="{{ asset('../users_img/'. $comm->user->photo) }}" alt="" class="rounded-circle" width="40" height="40">
            @if($comm->user)
            <h4>{{ $comm->user->name }}</h4>
            @endif
            <span>{{ $comm->created_at }}</span>
            <br>
            <p>{{ $comm->comm }}</p>
        </div>
        @if(Auth::check() && Auth::id()==$comm->user_id)
         <a href="{{ url('arts/arts_edit_comm/'. $comm->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
        <hr style="color: red;  border: 1px solid red;">
        @endif
        @empty
        {{ 'no comments yet' }}
        @endforelse
        
    </div>
    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
        
        <form id="algin-form" method="post" action="{{ url('arts/arts_single_details/'.$art->id) }}">
            @csrf
            <div class="form-group">
                <h4>Leave a comment</h4>
                <input type="hidden" name="id">
                <input type="hidden" name="user_id">
                <input type="hidden" name="art_id">
                <label for="message">Message</label>
                <textarea name="comm"  id=""msg cols="30" rows="5" class="form-control" style="background-color: white;" value="{{ old('comm') }}"></textarea>
                @error('comm')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <input type="submit" id="post" class="btn btn-primary" name="submit" value="Post a Comment">
            </div>
        </form>
    </div>
</div>
</div>
</section>
<!-- END BLOG ENTRIES -->
@include('section.footer')