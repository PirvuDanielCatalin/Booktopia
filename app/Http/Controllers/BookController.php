<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Validator;
use Image;
use Session;
use DB;
use Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('isAdminOrPartner')->except('show');
        $this->middleware('isAdmin')->only(['edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|string|max:101|unique:books,title',
                'author' => 'required|string|max:101',
                'publishing_house' => 'required|string|max:101',
                'description' => 'required|string|min:30|max:2000',
                'photo' => 'image',
                'price' => 'required|numeric|min:1',
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
                'image' => 'The :attribute field must be an image! ',
                'numeric' => 'The :attribute field must be a number! ',
            ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        } else {

            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'publishing_house' => $request->publishing_house,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            if ($request->has('photo')) {
                $image = $request->file('photo');
                $filename = $book->id . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/books-covers/');
                Image::make($image)->resize(400, 400)->save($location . $filename);
                $book->photo = $filename;
                $book->save();
            }

            if ($request->categories)
                foreach ($request->categories as $category_name) {
                    $category = Category::where('name', $category_name)->first();
                    $book->categories()->attach($category);
                }

            $book->inShop = (Auth::user()->isAdmin()) ? 1 : 0;
            $book->save();

            Session::flash('success', Lang::get('dictionary.book.add-success'));
            return redirect()->route('books.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $book_categories = [];
        foreach ($book->categories as $category) {
            $book_categories[] = $category->id;
        }
        return view('books.edit', ['book' => $book, 'book_categories' => $book_categories, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|string|max:101',
                'author' => 'required|string|max:101',
                'publishing_house' => 'required|string|max:101',
                'description' => 'required|string|min:30|max:2000',
                'photo' => 'image',
                'price' => 'required|numeric|min:1',
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
                'image' => 'The :attribute field must be an image! ',
                'numeric' => 'The :attribute field must be a number! ',
            ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        } else {

            $book->title = $request->title;
            $book->author = $request->author;
            $book->publishing_house = $request->publishing_house;
            $book->description = $request->description;

            $photo = $book->photo;
            if ($request->has('photo')) {
                if ($photo != null)
                    unlink(public_path('images/books-covers/') . $photo);
                $image = $request->file('photo');
                $filename = $book->id . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/books-covers/');
                Image::make($image)->resize(400, 400)->save($location . $filename);
                $book->photo = $filename;
            }

            $categories = Category::all();
            foreach ($categories as $category)
                $book->categories()->detach($category);

            if ($request->categories)
                foreach ($request->categories as $category_name) {
                    $category = Category::where('name', $category_name)->first();
                    $book->categories()->attach($category);
                }

            $book->price = $request->price;
            $book->save();

            Session::flash('success', Lang::get('dictionary.book.edit-success'));
            return redirect()->route('books.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->photo != null)
            unlink(public_path('images/books-covers/') . $book->photo);

        try {
            $book->delete();
            return ['status' => 'success', 'message' => Lang::get('dictionary.book.delete-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.book.delete-error')];
        }

    }

    public function drag_and_drop_upload(Request $request)
    {
        $file = $request->file('file')->getRealPath();
        $directory = public_path('images/helpers/');
        $imgname = 'DraggedAndDropped.jpg';
        Image::make($file)->resize(200, 200)->save($directory . $imgname);
    }

    public function import_from_CSV()
    {
        dd("Be careful! You don't wanna import wrong stuff!");
        $csvFile = file("C:\Users\danut\Downloads\books2.csv");
        $data = [];
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }

        for ($i = 1; $i < sizeof($data); $i++) {
            //dd($data[$i]);
            $book = Book::create([
                'title' => $data[$i][9],
                'author' => $data[$i][7],
                'publishing_house' => 'Unknown',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto
                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus
                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum
                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!
                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?',
                'price' => mt_rand(1, 100000) / 100,
            ]);

            $url = $data[$i][21];
            $contents = file_get_contents($url);
            $extension = substr($url, strrpos($url, '.') + 1);
            $location = public_path('images/books-covers/');
            $filename = $book->id . '.' . $extension;
            Image::make($contents)->resize(250, 400)->save($location . $filename);

            $book->photo = $filename;
            $book->inShop = 1;
            $book->save();
        }

        dd("The file was uploaded! Please check!");
    }
}
