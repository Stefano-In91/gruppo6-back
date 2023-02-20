<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Models\Technique;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cerca se la pagina artist linkata all'user id è stata creata e nel caso manda a index
        if( Artist::firstWhere('user_id', Auth::id()) ) {
            $artist = Artist::firstWhere('user_id', Auth::id());

            return view('admin.artist.index', compact('artist'));
        } else { 
        // Se non è ancora stata creata pagina Artista collegata a User reindirizza a create
            $techniques = Technique::all();
            return view('admin.artist.create', compact('techniques'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $techniques = Technique::all();

        return view('admin.artist.create', compact('techniques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        $userId = Auth::id();
        $data = $request->validated();

        $new_artist = new Artist();
        $new_artist->fill($data);
        $new_artist->user_id = $userId;
        $new_artist->slug = Str::slug($new_artist->artist_nickname);

        if( isset($data['profile_photo']) ) {            
            $img_path = Storage::disk('public')->put('uploads', $data['profile_photo']);
            $new_artist->profile_photo = $img_path;
        }

        $new_artist->save();

        $techniques = isset($data['techniques']) ? $data['techniques'] : [];
        $new_artist->techniques()->sync($techniques);

        return redirect()->route('admin.artist.index')->with('message', "Benvenuto $new_artist->name.");
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {

        return view('admin.artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        $techniques = Technique::all();

        return view('admin.artist.edit', compact('artist', 'techniques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $data = $request->validated();

        if( isset($data['profile_photo']) ) {            
            $img_path = Storage::disk('public')->put('uploads', $data['profile_photo']);
            $artist->profile_photo = $img_path;
        }

        $artist->update($data);
        $artist->slug = Str::slug($artist->artist_nickname);

        $artist->save();

        $techniques = isset($data['techniques']) ? $data['techniques'] : [];
        $artist->techniques()->sync($techniques);

        return redirect()->route('admin.artist.index')->with('message', 'Artista aggiornato correttamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        if( $artist->profile_photo ) {
            Storage::disk('public')->delete($artist->profile_photo);
        }

        $artist->delete();

        return redirect()->route('admin.dashboard')->with('message', 'Artista cancellato correttamente.');
    }
}
