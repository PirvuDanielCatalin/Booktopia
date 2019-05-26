<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TO DO Conditionat de Auth::user()
        $books = Book::with('stock')->where('books.inShop', '=', 1)->get();
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

            // TO DO Conditionat de Auth::user()
            $stock->amount = $stock->amount + $update_quantity;
            $stock->save();
            return ['status' => 'success', 'message' => Lang::get('dictionary.stock.update-success')];
        } else {
            return ['status' => 'error', 'message' => Lang::get('dictionary.stock.update-error')];
        }
    }

    public function get_stock(Request $request)
    {
        $book_id = $request->book_id;
        return Book::with('stock')->where('books.id', '=', $book_id)->first();
    }
}
