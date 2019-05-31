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
        $this->middleware('auth')->except('rate');
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

    public function destroy(BookComment $comment)
    {
        try {
            $comment->delete();
            return ['status' => 'success', 'message' => Lang::get('dictionary.comment.delete-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.comment.delete-error')];
        }
    }

    public function rate(Request $request)
    {
        try {
            $comment = BookComment::find($request->commentId);
            if ($request->action == 'like')
                $comment->approvals = $comment->approvals + 1;
            else if ($request->action == 'dislike')
                $comment->approvals = $comment->approvals - 1;
            $comment->save();
            return ['status' => 'success', 'message' => Lang::get('dictionary.comment.rate-success')];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => Lang::get('dictionary.comment.rate-error')];
        }
    }
}