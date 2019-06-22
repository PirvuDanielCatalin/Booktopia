<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Requirement;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class RequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdminOrPartner');
    }

    public function get_requirement(Request $request)
    {
        return Requirement::with(['book', 'user'])
            ->where('requirements.requirement_id', '=', $request->requirement_id)
            ->first();
    }

    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $requirements = Requirement::with(['book', 'user'])
                ->get();
        }
        if (Auth::user()->isPartner()) {
            $requirements = Requirement::with(['book', 'user'])
                ->where('requirements.user_id', '=', Auth::user()->id)
                ->get();
        }
        return view('requirements.index', ['requirements' => $requirements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Requirement $requirement
     * @return array|void
     */
    public function update(Request $request, Requirement $requirement)
    {
        try {
            if ($request->action == 'Accept') {
                if ($requirement->increment == 0) {
                    $book = Book::find($requirement->book_id);
                    $book->inShop = 1;
                    $book->save();

                    $requirement->status = 1;
                    $requirement->save();

                    return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.accept-success')];
                } else {
                    $stock = Book::find($requirement->book_id)->stock;
                    $stock->amount = $stock->amount + $requirement->increment;
                    $stock->save();

                    $requirement->status = 1;
                    $requirement->save();

                    return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.accept-success')];
                }
            } else if ($request->action == 'Deny') {
                $requirement->status = -1;
                $requirement->save();
                return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.deny-success')];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.requirement.status-error')];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Requirement $requirement
     * @return array|void
     */
    public function destroy(Requirement $requirement)
    {
        try {
            if ($requirement->increment == 0) {
                $book = Book::where('book_id', $requirement->book_id)->first();
                $requirements = Requirement::where('book_id', $book->book_id)->get();
                foreach ($requirements as $requirement)
                    $requirement->delete();
                $book->delete();
                return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.delete-success')];
            } else {
                $requirement->delete();
                return ['status' => 'success', 'message' => Lang::get('dictionary.requirement.delete-success')];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.requirement.delete-error')];
        }
    }
}
