@include('section.head')
@include('section.nav')
@include('section.header')
<div class="w3-row w3-padding w3-border">
    <div class="w3-col l8 s12">
      <div class="w3-container w3-white w3-margin w3-padding-large">
        <div class="w3-justify">
<div class="container mt-3">
  <h2>Edit  your own comments</h2>
  @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <form action="{{ url('arts/arts_edit_comm/'. $comm->id) }}" method="post">
    @csrf
    <input type="hidden" name="user_id">
    <input type="hidden" name="art_id">
    <input type="hidden" name="id" value="{{ $comm->id }}">
    <div class="mb-3 mt-3">
      <label for="email">Comments:</label>
      <input type="text" class="form-control" id="email" name="comm" value="{{ $comm->comm }}">
        @error('address')
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

