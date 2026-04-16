<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Auth::check()) {
            return back()->withErrors(['login_error' => "Please login first to post a comment"])
                ->withInput([
                    'comment' => $request->comment
                ]);
        }

        $request->validate([
            'comment' => 'required|max:200',
        ]);

        Comment::create([
            'comment' => trim($request->comment),
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
        ]);

        return redirect()->back()->with(['success' => "thanks for your comment  waiting for approval"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->status == 'pending') {
            $status = "approved";
        } else {
            $status = 'pending';
        }

        $comment->update([
            'status' => $status,
        ]);

        return redirect()->back()->with('success', "status changed successully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        if (! Auth::user()->role === 'admin') {
            if ($comment->user_id != Auth::user()->id) {
                abort(403, "you dont have permissions to deletee the comment");
            }
        }

        $comment->delete();
        return redirect()->back()->with('success', "Comment delete successfully");
    }
}
