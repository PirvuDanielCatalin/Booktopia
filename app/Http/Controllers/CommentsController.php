<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Validator;
use Session;
use DB;
use Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('isAdminOrPartner')->except('show');
        $this->middleware('isAdmin')->only(['edit', 'update', 'destroy']);
    }

    public function get_category(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, BookComment $bookComment)
    {

    }

    public function destroy(BookComment $bookComment)
    {

    }
}