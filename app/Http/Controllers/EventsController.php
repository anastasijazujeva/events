<?php

namespace App\Http\Controllers;

use App\Organizator;
use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'date_and_time' => ['required', 'date', 'after:today'],
            'place' => 'required',
            'category' => 'required',
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'image'],
        ]);

        $event = new Event();
        $event->title = $data['title'];
        $event->date_and_time = $data['date_and_time'];
        $event->place = $data['place'];
        $event->category = $data['category'];
        $event->price = $data['price'];
        $event->organizator_id = auth()->user()->organizator->id;
        $imagePath = request('image')->store('images/events', 'public');
        $event->image = $imagePath;

        $event->save();

//        auth()->user()->organizator()->events()->create([
//            'title' => $data['title'],
//            'date_and_time' => $data['date_and_time'],
//            'place' => $data['place'],
//            'category' => $data['category'],
//            'price' => $data['price'],
//            'image' => $imagePath,
//        ]);

        $events = Event::all();
        return view('home', ['events' => $events]);
    }
}
