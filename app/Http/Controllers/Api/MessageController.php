<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function message(StoreMessageRequest $request)
    {
        $data = $request->validated();

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->date = Carbon::now();
        $slug_matrix = "$new_message->title $new_message->date";
        $new_message->slug = Str::slug( $slug_matrix );
        $new_message->save();
    }
}
