<?php

namespace App\Http\Controllers;

use App\Models\BookComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Validator;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_comment(Request $request)
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'text' => 'required|string',
            ], [
                'required' => 'The :attribute field is required! ',
                'string' => 'The :attribute field must be a string! ',
            ]);

        if ($validator->fails()) {
            return ['status' => 'error',
                'message' => Lang::get('dictionary.comment.add-error'),
                'errors' => $validator->errors()];
        } else {

            $bookcomment = BookComment::create([
                'user_id' => Auth::user()->id,
                'book_id' => $request->bookId,
                'approvals' => 0,
                'text' => $request->text,
                'date' => Carbon::now(),
            ]);

            return ['status' => 'success', 'message' => Lang::get('dictionary.comment.add-success')];
        }
    }

    public function update(Request $request, BookComment $comment)
    {
        $validator = Validator::make($request->all(),
            [
                'text' => 'required|string',
            ], [
                'required' => 'The :attribute field is required! ',
                'string' => 'The :attribute field must be a string! ',
            ]);

        if ($validator->fails()) {
            return ['status' => 'error',
                'message' => Lang::get('dictionary.comment.edit-error'),
                'errors' => $validator->errors()];
        } else {

            $comment->text = $request->text;
            $comment->save();

            return ['status' => 'success', 'message' => Lang::get('dictionary.comment.edit-success')];
        }
    }

    public function destroy(BookComment $bookComment)
    {

    }
}