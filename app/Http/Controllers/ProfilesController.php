<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles.index', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        //dd(request()->all());

        if (request('image')) {
            $imagePath = request('image')->store('images/profile', 'public');
            $image = Image::make(public_path() . "/{$imagePath}")->fit(1200, 1200);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect('/profile/' . $user->id);
    }

    public function showProfilesRegisteredEvents(User $user)
    {
        $this->authorize('update', $user->profile);
        $events = $user->events;
        return view('events.user-registered-event-list', ['events' => $events]);
    }

    public function unregisterUserFromEvent(User $user, Event $event)
    {

        DB::table('event_user')
            ->where('user_id', '=', $user->id)
            ->where('event_id', '=', $event->id)
            ->delete();

        $redirectLink = 'profile/' . $user->id . '/registered/event';
        return redirect($redirectLink);
    }

    public function showProfilesCreatedEvents(User $user)
    {
        $this->authorize('update', $user->profile);
        $this->authorize('create', Event::class);

        $events = Event::where('organizator_id', auth()->user()->organizator->id)->get();

        return view('events.user-created-event-list', ['events' => $events]);
    }
}
