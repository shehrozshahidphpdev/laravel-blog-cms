<aside class="w-56 bg-white border-r border-gray-200 flex flex-col shrink-0 min-h-screen">

    <div class="px-4 py-5 border-b border-gray-200">
        <div class="text-lg font-medium text-gray-800">Blog</div>

        <nav class="flex-1 px-2 py-3 space-y-0.5">
            <p class="text-xs text-gray-400 uppercase tracking-wide px-2 py-1">Main</p>

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium
                      {{ request()->is('dashboard') ? 'bg-purple-50 text-purple-800' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
                <i
                    class=" fa-solid fa-house w-4 text-xs {{ request()->is('student/dashboard') ? 'text-purple-600' : 'text-gray-400' }}"></i>
                Dashboard
            </a>

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('accounts') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition
                                                                                                                                                                    ">
                    <i class="fa-solid fa-clock-rotate-left w-4 text-gray-400 text-xs"></i>
                    Accounts
                </a>
            @endif

            <p class="text-xs text-gray-400 uppercase tracking-wide px-2 py-1 pt-3">Account</p>

            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition">
                <i class="fa-solid fa-lock w-4 text-gray-400 text-xs"></i>
                Profile
            </a>
            <p class="text-xs text-gray-400 uppercase tracking-wide px-2 py-1 pt-3">CMS</p>

            @if(Auth::user()->role === 'admin')
                <a href="{{ route('categories.index') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition">
                    <i class="fa-solid fa-box w-4 text-gray-400 text-xs"></i>
                    Categories
                </a>

                {{-- tags --}}
                <a href="{{ route('tags.index') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition">
                    <i class="fa-solid fa-tag w-4 text-gray-400 text-xs"></i>
                    Tags
                </a>
            @endif

            @if(Auth::user()->role === 'editor' || Auth::user()->role == 'admin')
                <a href="{{ route('posts.index') }}"
                    class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition">
                    <i class="fa-solid fa-box w-4 text-gray-400 text-xs"></i>
                    Posts
                </a>
            @endif
            {{-- comments --}}
            <a href="{{ route('comments.index') }}"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition">
                <i class="fa-solid fa-pen w-4 text-gray-400 text-xs"></i>
                Comments
            </a>
        </nav>
    </div>

    <div class="mt-auto px-2 py-3 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-red-600 hover:bg-red-50 transition w-full">
                <i class="fa-solid fa-right-from-bracket text-xs w-4"></i>
                Logout
            </button>
        </form>
    </div>

</aside>