<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Book;
use Auth;
use Mail;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->only(['control-panel']);
        //$this->middleware('CountPeople')->except('contactemail');
    }

    public function index()
    {
        $books = Book::paginate(12);
        return view('general.shop-products', ['books' => $books]);
    }

    public function control_panel()
    {
        return view('general.control-panel');
    }

    public function shopping_cart(Request $request)
    {
        $session = get_object_vars(json_decode(base64_decode($request->input('session'))));
        $products = [];
        foreach (array_keys($session) as $product) {
            $id = preg_replace('/\D/', '', $product); // Extract the book id from session key
            $products[$id]['book'] = Book::find($id);
            $products[$id]['quantity'] = intval($session[$product]);
        }
        return view('general.shopping-cart', ['products' => $products]);
    }

    public function contactemail(Request $request)
    {
        $subject = (isset($request->subject)) ? $request->subject : '';
        $email = (isset($request->email)) ? $request->email : '';
        $text = (isset($request->text)) ? $request->text : '';

        Mail::send('helpers.email_format', ['text' => $text], function ($message) use ($subject, $email) {
            $message->subject($subject)
                ->from($email)
                ->to('booktopia.contact@gmail.com', 'Booktopia');
        });
        return back();
    }
}
