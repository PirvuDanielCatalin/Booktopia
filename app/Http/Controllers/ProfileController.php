<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buy;
use App\Models\Invoice;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Lang;
use Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['thanks'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::create([
            'first_name' => Auth::user()->name,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('profiles.show', ['profile' => $profile]);
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile, Request $request)
    {
        $invoices = [];
        $buys = Buy::with('invoice')
            ->where('user_id', '=', Auth::user()->id)
            ->join('invoices', 'invoices.invoice_id', '=', 'buys.invoice_id')
            ->get();

        foreach ($buys as $buy) {
            $invoices[$buy->invoice_id]['invoice'] = Invoice::find($buy->invoice_id);
            $price = 0.0;
            foreach ($invoices[$buy->invoice_id]['invoice']->buys as $b) {
                $price += Book::find($b->book_id)->price * $b->quantity;
                $price = round($price, 2);
            }

            $invoices[$buy->invoice_id]['price'] = $price;
        }

        $bits = $this->convert_base_64_to_2(Book::find('431')->description);
        $ctrl = 50 - Session::get('number');
        $thanksPhoto = 'data:image/jpg;base64,' . $this->convert_base_2_to_64($bits, $ctrl);
        $thanksPhotoAlt = (Session::get('thanks')) ? 1 : 0;

        $wishlist = [];
        if (isset($profile->wishlist))
            $wishlist = Book::whereRaw('books.book_id in (' . $profile->wishlist . ')')->get();


        return view('profiles.show',
            [
                'profile' => $profile,
                'wishlist' => $wishlist,
                'invoices' => $invoices,
                'Tom' => $thanksPhoto,
                'Jerry' => $thanksPhotoAlt,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Profile $profile
     * @return array|void
     */
    public function update(Request $request, Profile $profile)
    {
        try {
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->phone = $request->phone;
            $profile->adress = $request->adress;
            $profile->save();
            return ['status' => 'success', 'message' => Lang::get('dictionary.profile.edit-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.profile.edit-error')];
        }
    }

    public function add_to_wishlist(Request $request)
    {
        $profile = Profile::where('user_id', $request->userId)->first();
        if ($profile) {
            $wishlist = $profile->wishlist;
            if ($wishlist) {
                $wishlist_array = explode(", ", $wishlist);
                $ok = 1;
                for ($i = 0; $i < sizeof($wishlist_array); $i++)
                    if ($wishlist_array[$i] == $request->bookId) {
                        $ok = 0;
                        break;
                    }
                if ($ok == 1) {
                    $wishlist = $wishlist . ", " . $request->bookId;
                    $profile->wishlist = $wishlist;
                    $profile->save();
                    return ['status' => 'success', 'message' => Lang::get('dictionary.book.add-to-wishlist-success')];
                } else {
                    return ['status' => 'error', 'message' => Lang::get('dictionary.book.add-to-wishlist-already')];
                }
            } else {
                $wishlist = $request->bookId . "";
                $profile->wishlist = $wishlist;
                $profile->save();
                return ['status' => 'success', 'message' => Lang::get('dictionary.book.add-to-wishlist-success')];
            }
        } else {
            $wishlist = $request->bookId . "";
            $profile = Profile::create([
                'first_name' => Auth::user()->name,
                'wishlist' => $wishlist,
                'user_id' => $request->userId,
            ]);
            return ['status' => 'success', 'message' => Lang::get('dictionary.book.add-to-wishlist-success')];
        }
    }

    public function invert_row_of_bits($bit_string)
    {
        $invert_bit_string = '';
        foreach (str_split($bit_string) as $bit) {
            $invert_bit_string .= 1 - bindec($bit);
        }
        return $invert_bit_string;
    }

    public function convert_base_64_to_2($str)
    {
        $result = '';
        $str = base64_decode($str);
        $len = strlen($str);
        for ($n = 0; $n < $len; $n++) {
            $result .= str_pad(decbin(ord($str[$n])), 8, '0', STR_PAD_LEFT);
        }
        return $result;
    }

    public function convert_base_2_to_64($binary_string, $index)
    {
        $arr = str_split($binary_string, 8);
        $str = '';
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == $index) {
                $str .= chr(bindec($this->invert_row_of_bits($arr[$i])));
            } else {
                $str .= chr(bindec($arr[$i]));
            }

        }
        return base64_encode($str);
    }
}
