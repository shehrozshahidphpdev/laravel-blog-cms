<x-layouts.admin-layout title="admin dashboard">

  <div class="max-w-5xl mx-auto">

    @if(session('success'))
      <div class="message px-5 py-2 text-base bg-green-400 border-green-500 rounded-lg mb-3">
        {{ session('success') }}
      </div>
    @endif
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div>
        <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ count($posts) }} Posts</p>
      </div>
      <a href="{{ route('posts.create') }}"
        class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 active:scale-95 transition-all cursor-pointer">
        <span class="text-lg leading-none">+</span>
        Create post
      </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-gray-200 bg-gray-50">
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">#</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Image</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Author Name</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Category</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Title</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Content</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Status</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Tags</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Created At</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($posts as $post)
            <!-- Row 1 -->
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-4 py-3 text-gray-500">{{ $post->id }}</td>
              <td class="px-4 py-3 text-gray-500">
                <div class="rounded-md overflow-hidden">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="post image">
                </div>
              </td>
              <td class="px-4 py-3 text-gray-500">{{ $post->user->name }}</td>
              <td class="px-4 py-3 text-gray-700">{{ $post->category->name }}</td>
              <td class="px-4 py-3 text-gray-700">{{ $post->title }}</td>
              <td class="px-4 py-3 text-gray-700">{{ Str::limit($post->content, 20, '...') }}</td>
              <td class="px-4 py-3 text-gray-700">
                @if($post->status === 'active')
                  <span
                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700 border border-green-200 shadow-sm ">
                    {{ $post->status }}
                  </span>
                @else
                  <span
                    class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700 border border-red-200 shadow-sm ">
                    {{ $post->status }}
                  </span>
                @endif
              </td>
              <td class="px-4 py-3">
                <div class="flex flex-wrap gap-2">
                  @foreach ($post->tags as $tag)
                    <span
                      class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm ">
                      {{ $tag->name }}
                    </span>
                  @endforeach
                </div>
              </td>
              <td class="px-4 py-3 text-gray-500">{{ $post->created_at->format('M j, Y') }}</td>
              <td class=" px-4 py-3 flex gap-2 items-center ">
                <a href=" {{ route('posts.edit', $post->id) }}"
                  class="px-3 py-1 text-green-500 text-sm bg-green-100 rounded-md">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                  onsubmit="return confirm('Are you sure you want to delete the psot?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-3 py-1 text-red-500 bg-red-100 text-sm rounded-md ml-4">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr class="hover:bg-gray-50 transition-colors">
              <td colspan="7" class="px-4 py-3 text-center text-gray-500">
                No posts found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

    </div>
    <div class="paginaiton mt-5">
      {{ $posts->links() }}
    </div>
  </div>

</x-layouts.admin-layout>