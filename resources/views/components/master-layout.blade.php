@props([
    'title'
])
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? "My App" }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=DM+Sans:wght@300;400;500&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;1,8..60,300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
        @theme {
      --font-display: 'Playfair Display', Georgia, serif;
      --font-body:    'Source Serif 4', Georgia, serif;
      --font-ui:      'DM Sans', sans-serif;
    }
  </style>
</head>

<body class="bg-white text-black font-[family-name:var(--font-body)] antialiased">

    <!-- ░░ NAVBAR ░░ -->
    <nav class="bg-white border-b-2 border-black sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Top row: Brand + Search + Actions -->
            <div class="flex items-center justify-between gap-4 py-3 border-b border-stone-200">

                <!-- Brand -->
                <a href="#"
                    class="font-[family-name:var(--font-display)] text-3xl font-bold tracking-tight text-black no-underline whitespace-nowrap">
                    The <span class="text-red-600">Folio</span>
                </a>

                <!-- Search -->
                <div class="flex-1 max-w-md relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none" width="15"
                        height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="text" placeholder="Search articles, topics, authors…"
                        class="w-full border border-stone-200 bg-stone-50 rounded-sm pl-9 pr-4 py-2 font-[family-name:var(--font-ui)] text-sm text-black placeholder:text-stone-400 outline-none focus:border-red-600 transition-colors" />
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <a href="#"
                        class="font-[family-name:var(--font-ui)] text-sm font-medium text-black border border-transparent px-4 py-2 rounded-sm hover:border-stone-200 hover:bg-stone-100 transition-all whitespace-nowrap">Sign
                        In</a>
                    <a href="#"
                        class="font-[family-name:var(--font-ui)] text-sm font-medium bg-red-600 text-white px-5 py-2 rounded-sm hover:bg-red-700 transition-colors whitespace-nowrap">Subscribe</a>
                </div>
            </div>

            <!-- Nav links -->
            <div class="flex items-center overflow-x-auto gap-0">
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-red-600 border-b-2 border-red-600 pr-5 py-3 whitespace-nowrap">Home</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Latest</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Featured</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Authors</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Archive</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Podcast</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">About</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-stone-500 border-b-2 border-transparent pr-5 py-3 whitespace-nowrap hover:text-red-600 hover:border-red-600 transition-all">Contact</a>
            </div>
        </div>
    </nav>

    <!-- ░░ CATEGORY STRIP ░░ -->
    <div class="bg-black border-b-2 border-red-600">
        <div class="max-w-7xl mx-auto px-6 flex items-center overflow-x-auto gap-0">
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-red-500 border-b-2 border-red-500 pr-4 py-3 whitespace-nowrap">All</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Technology</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Science</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Culture</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Politics</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Philosophy</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Health</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Design</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">History</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Finance</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Environment</a>
            <a href="#"
                class="font-[family-name:var(--font-ui)] text-xs font-medium uppercase tracking-widest text-white/50 border-b-2 border-transparent pr-4 py-3 whitespace-nowrap hover:text-white transition-all">Travel</a>
        </div>
    </div>

    {{ $slot }}


    <!-- ░░ FOOTER ░░ -->
    <footer class="bg-black text-white mt-6">

        <div class="max-w-7xl mx-auto px-6 py-14 grid grid-cols-4 gap-10 border-b border-white/10">

            <!-- Brand col -->
            <div>
                <p class="font-[family-name:var(--font-display)] text-2xl font-bold mb-3">The <span
                        class="text-red-500">Folio</span></p>
                <p class="font-[family-name:var(--font-body)] text-sm italic text-white/50 leading-relaxed mb-5">
                    Thoughtful writing for curious minds. Published since 2019.</p>
                <div class="flex gap-2">
                    <a href="#"
                        class="w-9 h-9 border border-white/20 flex items-center justify-center font-[family-name:var(--font-ui)] text-xs font-semibold text-white/60 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all">𝕏</a>
                    <a href="#"
                        class="w-9 h-9 border border-white/20 flex items-center justify-center font-[family-name:var(--font-ui)] text-xs font-semibold text-white/60 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all">in</a>
                    <a href="#"
                        class="w-9 h-9 border border-white/20 flex items-center justify-center font-[family-name:var(--font-ui)] text-xs font-semibold text-white/60 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all">ig</a>
                    <a href="#"
                        class="w-9 h-9 border border-white/20 flex items-center justify-center font-[family-name:var(--font-ui)] text-xs font-semibold text-white/60 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all">yt</a>
                </div>
            </div>

            <!-- Topics -->
            <div>
                <p
                    class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-white mb-4">
                    Topics</p>
                <ul class="space-y-2.5">
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Technology</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Science</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Culture</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Health</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Finance</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Philosophy</a>
                    </li>
                </ul>
            </div>

            <!-- The Folio -->
            <div>
                <p
                    class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-white mb-4">
                    The Folio</p>
                <ul class="space-y-2.5">
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">About
                            Us</a></li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Our
                            Authors</a></li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Archive</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Podcast</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center gap-1.5 font-[family-name:var(--font-ui)] text-sm font-medium text-red-500 hover:text-red-400 transition-colors">
                            See All Posts →
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Account -->
            <div>
                <p
                    class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-white mb-4">
                    Account</p>
                <ul class="space-y-2.5">
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Sign
                            In</a></li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Subscribe</a>
                    </li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Write
                            for Us</a></li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Contact
                            Us</a></li>
                    <li><a href="#"
                            class="font-[family-name:var(--font-body)] text-sm text-white/50 hover:text-red-400 transition-colors">Advertise</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between gap-4">
            <span class="font-[family-name:var(--font-ui)] text-xs text-white/30">© 2026 The Folio. All rights
                reserved.</span>
            <div class="flex gap-5">
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs text-white/30 hover:text-white/60 transition-colors">Privacy
                    Policy</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs text-white/30 hover:text-white/60 transition-colors">Terms
                    of Use</a>
                <a href="#"
                    class="font-[family-name:var(--font-ui)] text-xs text-white/30 hover:text-white/60 transition-colors">Cookie
                    Settings</a>
            </div>
        </div>
    </footer>

    <script>
        // Category strip active toggle
        document.querySelectorAll('#cat-strip a').forEach(pill => {
            pill.addEventListener('click', e => {
                e.preventDefault();
                document.querySelectorAll('#cat-strip a').forEach(p => {
                    p.classList.remove('text-red-500', 'border-red-500');
                    p.classList.add('text-white/50', 'border-transparent');
                });
                pill.classList.remove('text-white/50', 'border-transparent');
                pill.classList.add('text-red-500', 'border-red-500');
            });
        });
    </script>
</body>

</html>