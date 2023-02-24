<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use App\Models\Technique;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Artist::firstWhere('user_id', Auth::id()) ) {
            $artist = Artist::firstWhere('user_id', Auth::id());
            $messages = Message::where('artist_id', $artist->id)->get();
    
            return view('admin.messages.index', compact('messages'));
        } else {
            return redirect()->route('admin.artists.create')->with('message', "Crea il tuo profilo Artista per continuare");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->slug = Str::slug($new_message->title);
        $new_message->save();

        return redirect()->route('admin.messages.index')->with('message', "$new_message->title aggiunto con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        if ( $message->artist_id ===  Artist::firstWhere('user_id', Auth::id())->id() ) {

            return view('admin.messages.show', compact('message'));
        }   else {
            return redirect()->route('admin.messages.index')->with('message', "Azione non permessa");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('admin.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $old_title = $message->title;

        $data = $request->validated();

        $message->slug = Str::slug($data['title']);
        $message->update($data);

        return redirect()->route('admin.messages.index')->with('message', "Il Messaggio $old_title è stato aggiornato.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $old_title = $message->title;

        $message->delete();

        return redirect()->route('admin.messages.index')->with('message', "Il Messaggio $old_title è stato cancellato." );
    }
}
