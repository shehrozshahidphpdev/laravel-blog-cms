<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPost = Post::with(['tags', 'user', 'category'])
            ->where('is_featured', 1)->first();
        $latestPosts = Post::with(['tags', 'user', 'category'])->take(8)->latest()->get();
        return view('index', compact('featuredPost', 'latestPosts'));
    }

    public function posts(Request $request, string $category = "")
    {
        $query = Post::with(['category', 'tags', 'user'])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc');
        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }
        if ($request->has('search') && $request->search !== '') {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('category', function ($q2) use ($search) {
                        $q2->where('name', 'LIKE', '%' . $search . '%');
                    });
            });
        };

        $posts = $query->paginate(10);
        return view('posts', compact('posts'));
    }

    public function readPost(string $slug)
    {
        $post = Post::with([
            'category',
            'tags',
            'user',
            'comments' => function ($q) {
                $q->where(function ($query) {
                    $query->where('status', 'approved')
                        ->orWhere(function ($q2) {
                            $q2->where('status', 'pending')
                                ->where('user_id', Auth::user()->id);
                        });
                });
            },
            'comments.user'
        ])
            ->where('slug', $slug)
            ->firstOrFail();
        // return $post;

        return view('show-post', compact('post'));
    }
}
