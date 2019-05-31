<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Lang;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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
    public function show(Profile $profile)
    {
        return view('profiles.show', ['profile' => $profile]);
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
}
