@include('section.head')
@include('section.nav')
@include('section.header')
<div class="w3-row w3-padding w3-border">
    <div class="w3-col l8 s12">
      <div class="w3-container w3-white w3-margin w3-padding-large">
        <div class="w3-justify">
<div class="container mt-3">
  <h2>Create your own workshop</h2>
  @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <form action="{{ url('arts/art_edit/'. $art->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id">
    <input type="hidden" name="id" value="{{ $art->id }}">
    <div class="mb-3 mt-3">
      <label for="email">Address:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter address" name="address" value="{{ $art->address }}">
        @error('address')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Number:</label>
      <input type="text" class="form-control" id="email" placeholder="total guests" name="number" value="{{ $art->number }}" >
      @error('number')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Math number:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter math_number" name="mat_number" value="{{ $art->number }}">
      @error('mat_number')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 mt-3">
      <label for="email">City:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter city" name="city" value="{{ $art->city }}">
      @error('city')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Country:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter contry" name="country" value="{{ $art->country }}">
      @error('country')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Images:</label>
      <input type="file" class="form-control" id="email" placeholder="Enter images" name="images" value="{{ $art->images }}">
      <img src="{{asset('arts_shops/' . $art->images) }}" alt="" style="width:70px;"><br>
      @error('images')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Title:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter title" name="title" value="{{ $art->title }}">
      @error('title')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Text:</label>
      <textarea type="text" class="form-control" id="pwd" placeholder="Enter text" name="text" value="{{ $art->text }}"></textarea>
      @error('text')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Begin at:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter time for begin" name="begin_at" value="{{ $art->begin_at }}">
      @error('begin_at')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Seats:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter your seats" name="seats" value="{{ $art->seats }}">
      @error('seats')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
   
    <input type="submit" class="btn btn-primary" name="submit" value="Update workshop">
  </form>
</div>
<hr>
</div>
</div>
</div>
</div>
@include('section.footer')

