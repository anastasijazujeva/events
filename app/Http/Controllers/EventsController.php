<?php

namespace App\Http\Controllers;

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
        dd($data);
        $event = new Event();

    }
}
