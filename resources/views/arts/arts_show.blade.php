@include('section.head')
@include('section.nav')
@include('section.header')
<div class="w3-row w3-padding w3-border">
    <div class="w3-col l8 s12">
  <h2 style="color:blue;">Your workshops</h2>
              @if(session()->has('message'))
    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Address</th>
        <th>Alowed seats</th>
        <th>
identification number</th>
    <th>City</th>
    <th>Contry</th>
    <th>Image</th>
    <th>Title</th>
    <th>Text</th>
    <th>Begin</th>
    <th>Seats</th>
    <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($art as $art)
      <tr>
        <td>{{ $art->address }}</td>
        <td>{{ $art->number }}</td>
        <td>{{ $art->mat_number }}</td>
        <td>{{ $art->city }}</td>
        <td>{{ $art->country }}</td>
        <td><img src="{{ asset('arts_shops/'.$art->images) }}" style="width: 50px;height: 50px;"></td>
        <td>{{ $art->title }}</td>
        <td>{{ Str::of($art->text)->words(3,' >>>') }}</td>
        <td>{{ $art->begin_at }}</td>
        <td>{{ $art->seats }}</td>
        <td><a href="{{ url('arts/arts_show/'. $art->id) }}">delete</a> | 
          <a href="art_edit/{{ $art->id }}">edit</a></td>

      </tr>
      @endforeach
     
    </tbody>
  </table>
</div>
</div>
@include('section.footer')
