<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Organizator;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
{
    public function index($id)
    {
        $event = Event::findOrFail($id);
        return view('events.eventsdetails', ['event' => $event]);
    }

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
            'description' => 'required',
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'image'],
        ]);

        $event = new Event();
        $event->title = $data['title'];
        $event->date_and_time = $data['date_and_time'];
        $event->place = $data['place'];
        $event->category = $data['category'];
        $event->description = $data['description'];
        $event->price = $data['price'];
        $event->organizator_id = auth()->user()->organizator->id;

        $imagePath = request('image')->store('images/events', 'public');
        $image = Image::make(public_path() . "/{$imagePath}")->fit(1200, 1200);
        $image->save();

        $event->image = $imagePath;
        $event->save();

        $events = Event::all();
        return view('home', ['events' => $events]);
    }
}
