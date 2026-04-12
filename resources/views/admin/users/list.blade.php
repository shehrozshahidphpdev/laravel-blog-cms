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
        <h1 class="text-2xl font-semibold text-gray-900">Users</h1>
        <p class="text-sm text-gray-500 mt-0.5">{{ count($users) }} members total</p>
      </div>
      <a href="{{ route('accounts.create') }}"
        class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 active:scale-95 transition-all cursor-pointer">
        <span class="text-lg leading-none">+</span>
        Create user
      </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-gray-200 bg-gray-50">
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Name</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Email</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Role</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Joined</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Status</th>
            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($users as $user)
            <!-- Row 1 -->
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-4 py-3">
                <div class="flex items-center gap-3">
                  <div
                    class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-semibold flex-shrink-0">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                  </div>
                  <span class="font-medium text-gray-900">{{ $user->name }}</span>
                </div>
              </td>
              <td class="px-4 py-3 text-gray-500">{{ $user->email }}</td>
              <td class="px-4 py-3 text-gray-700">{{ $user->role }}</td>
              <td class="px-4 py-3 text-gray-500">{{ $user->created_at->format('M j, Y') }}</td>
              <td class="px-4 py-3">
                <span
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                  {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                  {{ $user->status }}
                </span>
              </td>
              <td class=" px-4 py-3 flex gap-2 items-center ">
                <a href=" {{ route('accounts.edit', $user->id) }}"
                  class="px-3 py-1 text-green-500 text-sm bg-green-100 rounded-md">Edit</a>

                <form action="{{ route('accounts.delete', $user->id) }}" method="post"
                  onsubmit="return confirm('Are you sure you want to delete the account?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-3 py-1 text-red-500 bg-red-100 text-sm rounded-md ml-4">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr class="hover:bg-gray-50 transition-colors">
              <td colspan="7" class="px-4 py-3 text-center text-gray-500">
                No users found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
      <div class="paginaiton">
        {{ $users->links() }}
      </div>
    </div>

  </div>
</x-layouts.admin-layout>