@extends('layouts.admin')

@section('content')
  <?php
  // variabile il rating dell'artista (bisogna fare un parse INT)
  $average_review = 4;
  ?>

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
	{{-- top bar & titolo --}}
	<div class="top-bar">
		<h1>Dettagli Artista</h1>
		<a href="{{ route('admin.artist.edit', $artist) }}" class="btn btn-warning">
			<i class="fa-solid fa-pen-to-square"></i>
		</a>
		<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$artist->id}}">
			<i class="fa-solid fa-trash-can"></i>
		 </button>
	</div>
	{{-- /top bar & titolo --}}
	{{-- card dettagli --}}
	<div class="details">
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
				<div id="introduction_text" >{{$artist->introduction_text}}</div>				
				<script>	
						const text = document.getElementById('introduction_text');
						const textLength = 100; //quando supera 100 caratteri si verifica la condizione e SCATTA la feature
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
				
				<div class="artist__review ">
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
	{{-- /card dettagli --}}

	
	{{-- modal --}}
	<div class="modal fade" id="modal-{{$artist->id}}" tabindex="-1">
	 <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			 <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
			 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			 Sei sicuro di eliminare l'artista "{{$artist->artist_nickname}}"?
		  </div>
		  <div class="modal-footer">
			  <form action="{{ route('admin.artist.destroy', $artist) }}" method="POST" class="d-inline-block">
				 @csrf
				 @method('DELETE')
				 <button type="submit" class="btn btn-primary">Si</button>
			  </form>
			 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
		  </div>
		</div>
	 </div>
  </div>
	{{-- /modal --}}
@endsection
