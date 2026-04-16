<x-layouts.admin-layout>
  <div class="w-full mx-auto">

    {{-- Page Header --}}
    <div class="mb-8">
      <a href="{{ route('accounts') }}"
        class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Categories
      </a>
      <h1 class="text-2xl font-semibold text-gray-900">Create new tag</h1>
    </div>

    {{-- Form Card --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

      <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="px-6 py-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

          {{-- category Name --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="name">
              Name <span class="text-red-500">*</span>
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $tag->name) }}"
              placeholder="e.g php, laravel"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition " />
            @error('name')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
    </div>

    {{-- Form Actions --}}
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center justify-end gap-3 rounded-b-2xl">
      <a href="{{ route('tags.index') }}"
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