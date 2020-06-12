<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\Event;


class CommentController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, array('comment' => 'required|min:5|max:2000'));

        $comment = new Comment;
        $comment->text = $request->comment;
        $event = Event::findOrFail($request->event_id);
        $comment->user()->associate(auth()->user());
        $comment->event()->associate($event);
        $comment->save();

            $redirectLink = 'event/' . $request->event_id;
        return redirect($redirectLink);
    }

}
