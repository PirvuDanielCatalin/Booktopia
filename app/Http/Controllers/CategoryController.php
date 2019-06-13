<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use Session;
use Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function get_category(Request $request)
    {
        return Category::with('books')
            ->where('categories.category_id', $request->category_id)->first();
    }

    public function index()
    {
        $categories = Category::paginate(12);
        return view('categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string|min:1|max:51|unique:categories,name',
            ], [
                'required' => 'The :attribute field is required! ',
                'string' => 'The :attribute field must be a string! ',
                'min' => [
                    'string' => 'The :attribute field must have at least :min characters! ',
                    'numeric' => 'The :attribute field must be at least :min! '
                ],
                'max' => [
                    'string' => 'The :attribute field may not be greater than :max characters!  ',
                ],
                'unique' => 'The :attribute field value has already been used! ',
            ]);
        if ($validator->fails()) {
            return ['status' => 'error',
                'message' => Lang::get('dictionary.category.add-error'),
                'errors' => $validator->errors()];
        } else {
            $category = Category::create([
                'name' => $request->name,
            ]);

            return ['status' => 'success', 'message' => Lang::get('dictionary.category.add-success')];
        }
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'string', 'min:1', 'max:51',
                    Rule::unique('categories', 'name')->ignore($category->category_id, 'category_id')]
            ], [
                'required' => 'The :attribute field is required! ',
                'string' => 'The :attribute field must be a string! ',
                'min' => [
                    'string' => 'The :attribute field must have at least :min characters! ',
                    'numeric' => 'The :attribute field must be at least :min! '
                ],
                'max' => [
                    'string' => 'The :attribute field may not be greater than :max characters!  ',
                ],
                'unique' => 'The :attribute field value has already been used! ',
            ]);

        if ($validator->fails()) {
            return ['status' => 'error',
                'message' => Lang::get('dictionary.category.edit-error'),
                'errors' => $validator->errors()];
        } else {

            $category->name = $request->name;
            $category->save();
            return ['status' => 'success', 'message' => Lang::get('dictionary.category.edit-success')];
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return ['status' => 'success', 'message' => Lang::get('dictionary.category.delete-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.category.delete-error')];
        }
    }

    public function remove_book(Request $request)
    {
        try {
            $category = Category::find($request->categoryId);
            $book = Book::find($request->bookId);
            $book->categories()->detach($category);
            return ['status' => 'success', 'message' => Lang::get('dictionary.category.remove-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.category.remove-error')];
        }
    }
}
