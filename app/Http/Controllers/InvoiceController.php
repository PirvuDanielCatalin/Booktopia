<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buy;
use App\Models\Invoice;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Validator;
use Auth;
use Session;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];
        $rules['billing_address_radio'] = 'required';
        if ($request->input('billing_address_radio') == 2)
            $rules['billing_address_textarea'] = 'required';

        $rules['delivery_address_radio'] = 'required';
        if ($request->input('delivery_address_radio') == 2)
            $rules['delivery_address_textarea'] = 'required';

        $rules['payment_method_radio'] = 'required';

        $validator = Validator::make($request->all(), $rules, [
            'required' => 'The :attribute field is required! ',
        ]);

        if ($validator->fails()) {
            return back()->with(['shopping_cart' => $request->shopping_cart])->withErrors($validator->errors());
        } else {
            $invoice_data = [];
            $invoice_data['date'] = new \DateTime();

            if ($request->input('billing_address_radio') == 1)
                $invoice_data['billing_address'] = Auth::user()->profile->adress;
            else if ($request->input('billing_address_radio') == 2)
                $invoice_data['billing_address'] = $request->billing_address_textarea;

            if ($request->input('delivery_address_radio') == 1)
                $invoice_data['delivery_address'] = Auth::user()->profile->adress;
            else if ($request->input('delivery_address_radio') == 2)
                $invoice_data['delivery_address'] = $request->delivery_address_textarea;

            if ($request->user_used_points == 'true') {
                $invoice_data['withPoints'] = 1;
            } else {
                $invoice_data['withPoints'] = 0;
            }

            $invoice_data['step'] = 'registered';

            $invoice = Invoice::create($invoice_data);

            $shopping_cart = json_decode(rawurldecode($request->shopping_cart), true);

            $total_price = 0.0;
            $products = [];
            foreach ($shopping_cart as $book_id => $quantity) {
                $id = explode('_', $book_id)[1];
                $book = Book::find($id);

                $buy = Buy::create([
                    'book_id' => $id,
                    'user_id' => Auth::user()->id,
                    'invoice_id' => $invoice->invoice_id,
                    'quantity' => $quantity,
                ]);

                $total_price += $book->price * $quantity;
                $total_price = round($total_price, 2);

                $stock = $book->stock;
                $stock->amount = $stock->amount - $quantity;
                $stock->save();
            }

            $profile = null;
            if (isset(Auth::user()->profile)) {
                $profile = Auth::user()->profile;
            } else {
                $profile = Profile::create([
                    'first_name' => Auth::user()->name,
                    'user_id' => Auth::user()->id,
                ]);
            }

            if ($request->user_used_points == 'false') {
                $profile->wallet = $profile->wallet + intval(ceil(0.04 * $total_price));
                $profile->save();
            } else if ($request->user_used_points == 'true') {
                $profile->wallet = $profile->wallet - intval(ceil($total_price));
                $profile->save();
            }

            Session::flash('success', Lang::get('dictionary.invoice.order-success'));
            return redirect()->route('shop');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice['user'] = User::find($invoice->buys[0]->user_id)->profile;
        $invoice['buys'] = $invoice->buys;

        $total_price = 0.0;
        foreach ($invoice->buys as $buy) {
            $total_price += $buy->book->price * $buy->quantity;
            $total_price = round($total_price, 2);
        }
        $invoice['total'] = $total_price;

        return view('invoices.index', ['invoice' => $invoice]);
    }

    public function exportPDF(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $invoice['user'] = User::find($invoice->buys[0]->user_id)->profile;
        $invoice['buys'] = $invoice->buys;

        $total_price = 0.0;
        foreach ($invoice->buys as $buy) {
            $total_price += $buy->book->price * $buy->quantity;
            $total_price = round($total_price, 2);
        }
        $invoice['total'] = $total_price;

        $data = ['invoice' => $invoice];
        $pdf = PDF::loadView('invoices.export', $data);

        return $pdf->download('Invoice.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
