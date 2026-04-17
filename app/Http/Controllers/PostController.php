<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\MyHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::with(['tags', 'category', 'user'])
            ->where('author_id', Auth::user()->id)
            ->paginate(10);
        if ($request->user()->role == 'admin') {
            $posts = Post::orderByDesc('id')->paginate(10);
        }
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required|integer',
            'status' => 'nullable',
            'title' => 'required|string|max:255|unique:posts,title',
            'image' => 'required|mimes:png,jpeg,webp|max:5000',
            'content' => 'required|string|max:5000',
            'tags' => 'required|array',
            'is_featured' => 'nullable',

        ], [
            'tags.required' => "Atleast one tag is required",
            'category_id.required' => "caegory is required",
        ]);

        try {
            DB::beginTransaction();
            $file = $request->file('image');
            if ($file) {
                $fileName =  MyHelper::uploadFile($file);
            }
            $tags = $request->input('tags') ?? [];
            $tagsIds = array_values($tags);
            $data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $fileName,
                'author_id' => Auth::user()->id,
                'slug' => Str::slug($request->title)
            ];
            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }
            if ($request->filled('is_featured')) {
                $data['is_featured'] = $request->is_featured;
            }
            $post = Post::create($data);
            $post->tags()->sync($tagsIds);
            DB::commit();

            return to_route('posts.index')->with('success', "Post Created Successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
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
        $post = Post::with(['tags'])->findOrFail($id);
        // return $post;
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'category_id' => 'required|integer',
            'status' => 'nullable',
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'image' => 'nullable|mimes:png,jpeg,webp|max:5000',
            'content' => 'required|string|max:5000',
            'tags' => 'required|array',
            'is_featured' => 'nullable',

        ], [
            'tags.required' => "Atleast one tag is required",
            'category_id.required' => "caegory is required",
        ]);

        try {
            DB::beginTransaction();
            $fileName = $post->image;

            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName =  MyHelper::uploadFile($file);
            }
            $tags = $request->input('tags') ?? [];
            $tagsIds = array_values($tags);
            $data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $fileName,
                'author_id' => Auth::user()->id,
                'slug' => Str::slug($request->title)
            ];
            if ($request->filled('status')) {
                $data['status'] = $request->status;
            }
            if ($request->filled('is_featured')) {
                $data['is_featured'] = $request->is_featured;
            }
            $post->update($data);
            $post->tags()->sync($tagsIds);
            DB::commit();

            return to_route('posts.index')->with('success', "Post Updated Successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        if (! in_array($user->role, ['admin', 'editor'])) {
            abort(403, "You dont have the permissions to delet the post");
        }
        if ($user->role === 'editor' && $post->author_id !== $user->id) {
            abort(403, "You dont have the permissions to delet the post");
        }
        $filePath = $post->image;
        MyHelper::removeFile($filePath);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->back()->with('success', "Post Deleted Successfully");
    }
}
