<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Event;
use App\Organizator;
use App\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index($id)
    {
        $event = Event::findOrFail($id);
        return view('events.eventsdetails', ['event' => $event]);
    }

    public function create()
    {
        $this->authorize('create', Event::class);

        return view('events.create');
    }

    public function store()
    {
        $this->authorize('create', Event::class);

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

        $categoryId = Category::where('category', $data['category'])->get()[0]->id;
        $event->category_id = $categoryId;

        $event->description = $data['description'];
        $event->price = $data['price'];
        $event->organizator_id = auth()->user()->organizator->id;

        $imagePath = request('image')->store('images/events', 'public');
        $image = Image::make(public_path() . "/{$imagePath}")->fit(1200, 1200);
        $image->save();

        $event->image = $imagePath;
        $event->save();

        $events = Event::all();
        return redirect('home');
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Event $event)
    {
        $this->authorize('update', $event);

        $data = request()->validate([
            'title' => 'required',
            'date_and_time' => ['required', 'date', 'after:today'],
            'place' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric', 'min:0'],
            'image' => '',
        ]);

        $data['category'] = Category::where('category', $data['category'])->get()[0]->id;
        $data['category_id'] = $data['category'];
        unset($data['category']);

        if (request('image')) {
            $imagePath = request('image')->store('images/events', 'public');


            $image = Image::make(public_path() . "/{$imagePath}")->fit(1200, 1200);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        $allNewData = array_merge($data, $imageArray ?? []);
        $event->update($allNewData);

        $redirectLink = 'profile/' . auth()->user()->id . '/created/event';

        return redirect($redirectLink);
    }

    public function delete(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();

        $redirectLink = 'profile/' . auth()->user()->id . '/created/event';
        return redirect($redirectLink);
    }

    public function registerForEvent(Request $request)
    {

        DB::table('event_user')->insert([
            ['user_id' => auth()->user()->id, 'event_id' => $request->event_id]
        ]);

        $response = 'User successfully registered for event';
        return response()->json(['success'=>$response]);
    }

    public function unregisterFromEvent(Request $request)
    {
        DB::table('event_user')
            ->where('user_id', '=', auth()->user()->id)
            ->where('event_id', '=', $request->event_id)
            ->delete();

        $response = 'User successfully unregistered from event';
        return response()->json(['success'=>$response]);
    }

    public function getEventsAPI()
    {
        $events = Event::get();
        return EventResource::collection($events);
    }
}
