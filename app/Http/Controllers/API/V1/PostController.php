<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\MyHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return response()->json([
      'success' => true,
      "message" => "Posts fetched successfully",
      "data" => $posts
    ], 200);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
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

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => "Validaitons failed",
        'errors' => $validator->errors(),
      ], 422);
    }

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

      return response()->json([
        'success' => true,
        'message' => "Post Created Successfully!",
        'data' => $post,
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return response()->json([
        'success' => false,
        'message' => "Post Not Created Successfully!",
        'error' => $e->getMessage(),
      ], 201);
    }
  }

  public function update(Request $request, string $id)
  {
    // return response()->json([
    //   'qqdfwef' => "wdqwd",
    // ]);
    $user = Auth::user();

    $post = Post::findOrFail($id);

    $validator = Validator::make($request->all(), [
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

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => "Validaitons failed",
        'errors' => $validator->errors(),
      ], 422);
    }

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

      return response()->json([
        'success' => true,
        'message' => "Post Updated Successfully!",
        'data' => $post,
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return response()->json([
        'success' => false,
        'message' => "Post Not Updated Successfully!",
        'error' => $e->getMessage(),
      ], 500);
    }
  }

  public function show(string $slug)
  {
    $userId = Auth::id();
    $post = Post::with([
      'category',
      'tags',
      'user',
      'comments' => function ($q) use ($userId) {
        $q->where(function ($query) use ($userId) {
          $query->where('status', 'approved')
            ->orWhere(function ($q2) use ($userId) {
              $q2->where('status', 'pending')
                ->where('user_id', $userId);
            });
        });
      },
      'comments.user'
    ])
      ->where('slug', $slug)
      ->firstOrFail();

    if (! $post) {
      return response()->json([
        'success' => false,
        'message' => "Post not found successfully!",
      ], 404);
    }
    return response()->json([
      'success' => true,
      'message' => "Post Found successfully!",
      'data' => $post,
    ], 200);
  }


  public function destroy(string $id)
  {
    $post = Post::findOrFail($id);
    $user = Auth::user();

    if (! in_array($user->role, ['admin', 'editor'])) {
      return response()->json([
        'success' => false,
        'message' => "you dont have permisssion to delet the post",
      ], 403);
    }

    if ($user->role === 'editor' && $post->author_id !== $user->id) {
      return response()->json([
        'success' => false,
        'message' => "you dont have permisssion to delet the post",
      ], 403);
    }

    $filePath = $post->image;
    MyHelper::removeFile($filePath);
    $post->tags()->sync([]);

    try {
      $post->delete();
      return response()->json([
        'success' => true,
        'message' => "Post Deleted Successfully",
        'post_id' => $post->id
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => "Post not deleted successfully",
        'error' => $e->getMessage()
      ]);
    }
  }
}
