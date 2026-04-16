<x-layouts.admin-layout>
  <div class="w-full mx-auto">

    {{-- Page Header --}}
    <div class="mb-8">
      <a href="{{ route('posts.index') }}"
        class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Posts
      </a>
      <h1 class="text-2xl font-semibold text-gray-900">edit post</h1>
    </div>

    {{-- Form Card --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

      <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="px-6 py-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

          {{-- Category --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="category_id">
              Category
              <span class="text-gray-400 font-normal text-xs">(optional)</span>
            </label>
            <select id="category_id" name="category_id"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition">
              <option value="" disabled selected>Select a category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('category_id')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Status --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="status">
              Status
              <span class="text-gray-400 font-normal text-xs">(optional — defaults to active)</span>
            </label>
            <select id="status" name="status"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition">
              <option value="">Select a status</option>
              <option value="active" @selected(old('status', $post->status) == 'active')>Active</option>
              <option value="inactive" @selected(old('status', $post->status) == 'inactive')>Inactive</option>
            </select>
            @error('status')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>



          {{-- Title --}}
          <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="title">
              Title <span class="text-red-500">*</span>
            </label>
            <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}"
              placeholder="Enter post title"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" />
            @error('title')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Content --}}
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="content">
              Content <span class="text-red-500">*</span>
            </label>
            <textarea name="content" id="content" rows="8"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition">{{ old('content', $post->content) }}</textarea>
            @error('content')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- tags --}}
          <div class="sm:col-span-2 mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="content">
              Tags <span class="text-red-500">*</span>
            </label>
            <div class="flex flex-wrap gap-3">
              @foreach ($tags as $tag)
                <div class="tag-group flex gap-2 items-center cursor-pointer">
                  <input type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                    class="cursor-pointer" @checked($post->tags->contains($tag->id))>
                  <label for="tag-{{ $tag->id }}" class="cursor-pointer">{{ $tag->name }}</label>
                </div>
              @endforeach
            </div>
            @error('tags')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>
          {{-- Image --}}
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="image">
              Image <span class="text-red-500">*</span>
            </label>
            <input id="image" name="image" type="file"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" />
            @error('image')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <div class="image-preview w-40 h-40 overflow-hidden mt-5 rounded-lg border shadow-sm">
              <img src="{{ asset('storage/' . $post->image) }}" alt="post image" class="w-full h-full object-cover">
            </div>
          </div>

        </div>

        {{-- Form Actions --}}
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center justify-end gap-3 rounded-b-2xl">
          <a href="{{ route('posts.index') }}"
            class="text-sm font-medium text-gray-600 hover:text-gray-900 px-4 py-2.5 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 transition">
            Cancel
          </a>
          <button type="submit"
            class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-6 py-2.5 rounded-lg hover:bg-gray-700 active:scale-95 transition-all">
            Save
          </button>
        </div>

      </form>
    </div>

  </div>
</x-layouts.admin-layout>