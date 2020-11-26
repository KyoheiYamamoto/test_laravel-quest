<div class="movies row mt-5 text-center">
    
  @foreach ($movies as $key=>$user)


    @if ($loop->iteration % 3 ==1 && $loop->iteration !=1)

      </div>

      <div class="row mt-3 text-center">

    @endif

      <div class="col-lg-4 mb-5">

        <div class="movie text-left d-inline-block">


          <div>
            @if ($movie)
              <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$movie->url }}?controls=1&loop=1&playlist={{ $movie->url }}" frameborder="0"></iframe>
            @else
              <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>

            @endif
          </div>
          <p>
              @if (isset($movie->comment))
                    {{$movie->comment}}
              @endif
          </p>

        </div>

      </div>

  @endforeach
</div>

{{ $movies->links('pagination::bootstrap-4') }}
