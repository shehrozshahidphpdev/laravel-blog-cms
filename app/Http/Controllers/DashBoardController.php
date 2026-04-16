<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $posts = Post::where('author_name', Auth::user()->id)
            ->paginate(10);
        $comments = Comment::whereHas('post', function ($q) {
            $q->where('author_name', Auth::user()->id);
        })->count();
        // dd($comments);
        return view('admin.index', compact('posts', 'comments'));
    }

    public function comments()
    {
        $userId = Auth::user()->id;
        $comments = Comment::with('user')->whereHas('post', function ($q) {
            $q->where('author_name', Auth::user()->id);
        })->paginate(15);

        if (Auth::user()->role == 'admin') {
            $comments = Comment::with('user')
                ->orderBy('id', 'desc')->paginate(15);
        }
        return view('admin.comments.list', compact('comments'));
    }
}
