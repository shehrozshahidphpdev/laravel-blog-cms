<aside class="w-56 bg-white border-r border-gray-200 flex flex-col shrink-0 min-h-screen">

    {{-- Brand --}}
    <div class="px-4 py-4 border-b border-gray-200 flex items-center gap-2.5">
        <div class="w-7 h-7 rounded-lg bg-purple-600 flex items-center justify-center shrink-0">
            {{-- pen/blog icon --}}
        </div>
        <span class="text-sm font-medium text-gray-800">Blog Admin</span>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-2.5 py-3 space-y-0.5 overflow-y-auto">

        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider px-2 pb-1">Content</p>

        <a href="/"
            class="flex items-center gap-2.5 px-2.5 py-1.5 rounded-lg text-sm font-medium
                   {{ request()->is('admin/dashboard') ? 'bg-purple-50 text-purple-800' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }} transition-colors">
            {{-- grid icon --}}
            Dashboard
        </a>

        {{-- ... repeat for Posts, Categories, Comments ... --}}

        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider px-2 pb-1 pt-3">Users</p>

        {{-- All Users, Add User --}}

        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider px-2 pb-1 pt-3">Account</p>

        {{-- Change Password, Profile --}}

    </nav>

    {{-- Logout --}}
    <div class="px-2.5 py-3 border-t border-gray-200">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2.5 px-2.5 py-1.5 rounded-lg text-sm text-red-700 hover:bg-red-50 transition-colors w-full">
                {{-- logout icon --}}
                Logout
            </button>
        </form>
    </div>

</aside>