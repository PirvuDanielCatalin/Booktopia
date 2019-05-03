<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
        //$this->middleware('CountPeople')->only(['index','create','show','edit']);
    }

    public function get_category(Request $request)
    {

        return Category::find($request->category_id);
    }

    public function index()
    {
        $categories = Category::paginate(12);
        return view('categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        Session::flash('succes', 'The category was successfully created!');
        return redirect()->route('categories.index');
    }

    public function update(Request $request, Category $category)
    {
        dd($request->all(), $category);
    }

    public function destroy(Category $category)
    {
        dd($category);
    }
}
