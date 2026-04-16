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
        Back to Accounts
      </a>
      <h1 class="text-2xl font-semibold text-gray-900">Edit user account</h1>
      <p class="text-sm text-gray-500 mt-1">Fill in the details below to add a new user account.</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

      <form action="{{ route('accounts.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Personal Information --}}
        <div class="px-6 py-5 border-b border-gray-100">
          <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Personal information</h2>
        </div>

        <div class="px-6 py-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

          {{-- Name --}}
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="name">
              Name <span class="text-red-500">*</span>
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
              placeholder="Enter full name"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition " />
            @error('name')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Email --}}
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="email">
              Email address <span class="text-red-500">*</span>
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
              placeholder="e.g. user@example.com"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition " />
            @error('email')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

        </div>

        {{-- Account Details --}}
        <div class="px-6 py-5 border-t border-b border-gray-100">
          <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Account details</h2>
        </div>

        <div class="px-6 py-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

          {{-- Role --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="role">
              Role
              <span class="text-gray-400 font-normal text-xs">(optional — defaults to Editor)</span>
            </label>
            <select id="role" name="role"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition">
              <option value="">Select a role</option>
              <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
              <option value="editor" @selected(old('role', $user->role) === 'editor')>Editor</option>
              <option value="visitor" @selected(old('role', $user->role) === 'visitor')>Visitor</option>
            </select>
            @error('role')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Status --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="status">
              Status
              <span class="text-gray-400 font-normal text-xs">(optional — defaults to Active)</span>
            </label>
            <select id="status" name="status"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition">
              <option value="">Select a status</option>
              <option value="active" @selected(old('status', $user->status) === 'active')>Active</option>
              <option value="inactive" @selected(old('status', $user->status) === 'inactive')>Inactive
              </option>
            </select>
            @error('status')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Password --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="password">
              New Password <span class="text-red-500">*</span>
            </label>
            <input id="password" name="password" type="password" placeholder="Min. 8 characters"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition " />
            @error('password')
              <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
            @enderror
          </div>

          {{-- Confirm Password --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5" for="password_confirmation">
              Confirm password <span class="text-red-500">*</span>
            </label>
            <input id="password_confirmation" name="password_confirmation" type="password"
              placeholder="Re-enter password"
              class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition" />
          </div>
        </div>

        {{-- Form Actions --}}
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center justify-end gap-3 rounded-b-2xl">
          <a href="{{ route('accounts') }}"
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