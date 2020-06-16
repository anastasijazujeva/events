<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function showFilteredEvents($id)
    {
        $category = Category::findOrFail($id);
        $events = Event::where('category_id', $category->id)->get();
        return view('home', ['events' => $events]);
    }
}
