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
        <h1 class="text-2xl font-semibold text-gray-900">Categories</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ count($categories) }} total categories</p>
      </div>
      <a href="{{ route('categories.create') }}"
        class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 active:scale-95 transition-all cursor-pointer">
        <span class="text-lg leading-none">+</span>
        Create category
      </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-gray-200 bg-gray-50">
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">#</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Name</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Slug</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($categories as $category)
            <!-- Row 1 -->
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-4 py-3">
                <span class="font-medium text-gray-900">{{ $category->id }}</span>
              </td>
              <td class="px-4 py-3">
                <span class="font-medium text-gray-900">{{ $category->name }}</span>
              </td>

              <td class="px-4 py-3">
                {{ $category->slug }}
              </td>

              <td class=" px-4 py-3 flex gap-2 items-center ">
                <a href=" {{ route('categories.edit', $category->id) }}"
                  class="px-3 py-1 text-green-500 text-sm bg-green-100 rounded-md">Edit</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                  onsubmit="return confirm('Are you sure you want to delete the category?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-3 py-1 text-red-500 bg-red-100 text-sm rounded-md ml-4">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr class="hover:bg-gray-50 transition-colors">
              <td colspan="7" class="px-4 py-3 text-center text-gray-500">
                No categories found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
      <div class="paginaiton">
        {{ $categories->links() }}
      </div>
    </div>

  </div>
</x-layouts.admin-layout>