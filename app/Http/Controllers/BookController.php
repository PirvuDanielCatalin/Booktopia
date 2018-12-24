<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Validator;
use Purifier;
use Image;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        //dd($books);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:101|unique:books,title',
            'author' => 'required|string|max:101',
            'publishing_house' => 'required|string|max:101',
            'description' => 'required|string|min:30|max:2000',
            'photo' => /*'required|*/
                'image',
            'price' => 'required|numeric',
        ], [
            'required' => '!Câmpul este obligatoriu; ',
            'min' => '!Descrierea trebuie să conțină cel puțin :min caractere; ',
            'max' => '!Câmpul trebuie să conțină cel mult :max caractere; ',
            'unique' => '!Titlul este deja folosit; ',
            'image' => '!Câmpul trebuie să fie o imagine; ',
            'numeric' => '!Câmpul trebuie să fie un număr; ',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        } else {
            $book = new Book();
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publishing_house = $request->publishing_house;
            $book->description = $request->description;

            if ($request->has('photo')) {
                $image = $request->file('photo');
                $filename = $book->title . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/');
                Image::make($image)->resize(400, 400)->save($location . $filename);
                $book->photo = $filename;
            } else {
                $book->photo = '';
            }

            $book->price = $request->price;
            $book->save();
            Session::flash('succes', 'Cartea a fost salvată cu succes!');
            return redirect()->route('books.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        dd($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:101',
            'author' => 'required|string|max:101',
            'publishing_house' => 'required|string|max:101',
            'description' => 'required|string|min:30|max:2000',
            'photo' => /*'required|*/
                'image',
            'price' => 'required|numeric',
        ], [
            'required' => '!Câmpul este obligatoriu; ',
            'min' => '!Descrierea trebuie să conțină cel puțin :min caractere; ',
            'max' => '!Câmpul trebuie să conțină cel mult :max caractere; ',
            'unique' => '!Titlul este deja folosit; ',
            'image' => '!Câmpul trebuie să fie o imagine; ',
            'numeric' => '!Câmpul trebuie să fie un număr; ',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        } else {
            $photo = $book->photo;
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publishing_house = $request->publishing_house;
            $book->description = $request->description;

            if ($request->has('photo')) {
                if ($photo != '')
                    unlink(public_path('images/') . $photo);
                $image = $request->file('photo');
                $filename = $book->title . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/');
                Image::make($image)->resize(400, 400)->save($location . $filename);
                $book->photo = $filename;
            }

            $book->price = $request->price;
            $book->save();
            Session::flash('succes', 'Cartea a fost modificată cu succes!');
            return redirect()->route('books.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //dd($book);
        $book->delete();
        return response('S-a sters', 200)
            ->header('Content-Type', 'text/plain');
    }
}
