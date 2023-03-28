<!-- Grid -->
<div class="w3-row w3-padding w3-border">
  <!-- Blog entries -->
  <div class="w3-col l8 s12">
    
    <!-- Blog entry -->
    <div class="w3-container w3-white w3-margin w3-padding-large">
      @foreach($arts as $art)
      <div class="w3-center">
        <h3>{{ $art->title }}</h3>
        <h5><span class="w3-opacity">{{ $art->created_at }}</span></h5>
      </div>
      <div class="w3-justify">
        <img src="{{ asset('../arts_shops/'.$art->images) }}"  style="width:100%" class="w3-padding-16">
        <p><strong>Allowed seats- {{ $art->number }}</strong> {{ $art->begin_at }}</p>
        
        <p class="w3-left"><a href="{{ url('arts/arts_single_details/'.$art->id ) }}" class="w3-button w3-white w3-border"><b>View more</b></a></p>
        <br><br>
        @endforeach
        
      </div>
    </div>
  </div>
</div>
{!! $arts->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
<!-- END BLOG ENTRIES -->