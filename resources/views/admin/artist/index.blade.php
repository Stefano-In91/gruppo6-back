@extends('layouts.admin')

@section('content')

<?php
// variabile il rating dell'artista (bisogna fare un parse INT)
$average_review = 4;
?>

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="container-fluid">
	<h1>Dettagli Artista</h1>
	<div class="details | row">
		<div class="artist | p-3 rounded-3 col-12 col-xxl-6">
			{{-- foto profilo --}}
			<div class="artist__avatar">
				@if ($artist->profile_photo)
				<img src="{{asset("storage/$artist->profile_photo")}}" alt="{{$artist->artist_nickname}}" >
				@else
				<img src="https://via.placeholder.com/100" alt="placeholder" >
				@endif
			</div>
			{{-- /foto profilo --}}
	
			<div class="artist__info">
				<h3>{{$artist->artist_nickname}}</h3>
				{{-- descrizione intro artista --}}
				<div id="introduction_text" >{{$artist->introduction_text}} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ipsum repudiandae saepe alias facilis sint dignissimos aliquam accusamus. Earum qui non, dignissimos sed delectus incidunt harum eveniet? Sed, optio laborum! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque mollitia nostrum ut iusto! Temporibus autem ratione error unde in quae deleniti nobis aperiam repellendus dolorem voluptates, quam quos facilis id. </div>				
				<script>	
					const text = document.getElementById('introduction_text');
					const textLength = 100; //mostra solo i primi 100 caratteri
					let isClicked = false;
					const textInnerhtml = text.textContent;

					if (text.textContent.length > textLength ) {
						text.style.cursor = "pointer";
						text.style.whiteSpace = "nowrap";
						text.style.overflow = "hidden";
						text.style.textOverflow = "ellipsis";

						text.addEventListener("click", function() {
						isClicked = !isClicked;
							if (isClicked) {
									text.style.whiteSpace = "normal";
									text.style.overflow = "visible";
									text.style.textOverflow = "clip";
									text.textContent =  `${textInnerhtml} Nascondi`;
							} else {
									text.style.whiteSpace = "nowrap";
									text.style.overflow = "hidden";
									text.style.textOverflow = "ellipsis";
									text.textContent = text.textContent.slice(0, textLength);
							}
    				});
				}
				</script>
				{{-- /descrizione intro artista --}}
				<div class="artist__contacts">
					<ul>
						<li>
							<i class="fa-solid fa-location-dot"></i> {{$artist->address}}
						</li>
						<li>
							<i class="fa-solid fa-phone"></i> {{$artist->phone_number}}
						</li>
					</ul>
				</div>
	
				<div class="artist__review | mt-auto">
					{{-- stelline  --}}
					<div class="artist__review__stars">
						Valutazione:
						@for ($i = 0; $i < $average_review; $i++)
						<i class="fa-solid fa-star"></i>
						@endfor
						@for ($i = 0; $i < 5 - $average_review; $i++)
						<i class="fa-regular fa-star"></i>
						@endfor
					</div>
					{{-- /stelline --}}
					<a href="#">Vedi tutte le recensioni</a>
				</div>
			</div>
		</div>
		
	</div>
</div>
  
  <table class="d-none">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="col">Nome</th>
        <th scope="col" class="col">Introduzione</th>
        <th scope="col" class="col">Indirizzo</th>
        <th scope="col" class="col">Numero di Telefono</th>
        <th scope="col" class="col">Foto Profilo</th>
        <th scope="col" class="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">></th>
        <td>{{ $artist->artist_nickname }}</td>
        <td>{{ $artist->introduction_text }}</td>
        <td>{{ $artist->address }}</td>
        <td>{{ $artist->phone_number }}</td>

        @if ($artist->profile_photo)
        <td> 
          <img src="{{asset("storage/$artist->profile_photo")}}" alt="{{$artist->artist_nickname}}">
        </td>
        @else
        <td>
          <img src="https://via.placeholder.com/100" alt="placeholder">
        </td>
        @endif
        
        <td>
          <a href="{{ route('admin.artist.edit', $artist) }}"><button
              class="btn btn-secondary">Modifica</button></a>
          <form action="{{ route('admin.artist.destroy', $artist) }}" method="POST" class="d-inline">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Elimina</button>

          </form>
        </td>
      </tr>
    </tbody>
  </table>
@endsection
