<x-layouts.admin-layout title="admin dashboard">

  <div class="max-w-5xl mx-auto">

    @if(session('success'))
      <div class="px-5 py-2 text-base bg-green-400 border-green-500 rounded-lg mb-3">
        {{ session('success') }}
      </div>
    @endif

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div>
        <h1 class="text-2xl font-semibold text-gray-900">Comments</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ count($comments) }} total comments</p>
      </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-gray-200 bg-gray-50">
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">#</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">User</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Comment</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Status</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($comments as $comment)
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-4 py-3">
                <span class="font-medium text-gray-900">{{ $comment->id }}</span>
              </td>
              <td class="px-4 py-3">
                <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
              </td>
              <td class="px-4 py-3 max-w-xs">
                {{-- <p class="text-gray-600 truncate"></p> --}}
                <textarea class="w-full border rounded p-2" rows="5" readonly>
                                                                                          {{ $comment->comment }}
                                                                                          </textarea>
              </td>

              <td class="px-4 py-3">
                @if($comment->status === 'approved')
                  <span
                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700 border border-green-200">
                    {{ $comment->status }}
                  </span>
                @else
                  <span
                    class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
                    {{ $comment->status }}
                  </span>
                @endif
              </td>
              <td class="px-4 py-3 flex gap-2 items-center">
                <form action="{{ route('comments.status', $comment->id) }}" method="POST">
                  @csrf
                  @method('put')
                  <button class="px-3 py-1 text-gray-600 text-sm bg-gray-100 rounded-md hover:bg-gray-200 transition">
                    {{ $comment->status == 'approved' ? 'Pending' : 'Approve' }}
                  </button>
                </form>

                {{-- delete btn --}}
                @if(Auth::user()->role === 'admin')
                  <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this comment?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="px-3 py-1 text-red-500 bg-red-100 text-sm rounded-md hover:bg-red-200 transition">
                      Delete
                    </button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                No comments found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="px-4 py-3 border-t border-gray-100">
        {{ $comments->links() }}
      </div>
    </div>

  </div>
</x-layouts.admin-layout>