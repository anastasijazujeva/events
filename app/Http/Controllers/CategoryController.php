<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category', 'asc')->get();
        return view('categories', ['categories' => $categories]);
    }

    public function showFilteredEvents($id)
    {
        $category = Category::findOrFail($id);
        $events = Event::where('category_id', $category->id)->get();
        return view('home', ['events' => $events]);
    }

    public function store()
    {
        $this->authorize('create', Category::class);

        $data = request()->validate([
            'category' => ['required', 'unique:categories', 'string'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('images/categories', 'public');
        $image = Image::make(public_path() . "/{$imagePath}")->fit(1200, 1200);
        $image->save();

        $category = new Category();
        $category->category = $data['category'];
        $category->image = $imagePath;
        $category->save();

        return redirect()->back()->with('message', 'Category successfully added!');
    }
}
