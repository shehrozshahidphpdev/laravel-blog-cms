<x-master-layout title="Home Page">
    <!-- ░░ HERO FEATURED POST ░░ -->
    <section class="max-w-7xl mx-auto px-6 pt-10">
        <div class="grid grid-cols-[1fr_340px] border border-stone-200">

            <!-- Cover image -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="Featured post"
                    class="w-full h-[420px] object-cover block group-hover:scale-105 transition-transform duration-500" />
                <span
                    class="absolute top-4 left-4 bg-red-600 text-white font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase px-3 py-1">✦
                    Editor's Pick</span>
            </div>

            <!-- Side panel -->
            <div class="bg-white border-l border-stone-200 flex flex-col justify-between p-8">
                <div>
                    <p
                        class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-red-600">
                        {{ strtoupper($featuredPost->category->name) }}
                    </p>
                    <h1
                        class="font-[family-name:var(--font-display)] text-[1.65rem] font-bold leading-tight text-black mt-2 mb-3">
                        {{ $featuredPost->title }}
                    </h1>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500">
                        {{ Str::limit($featuredPost->content, 200, '...') }}
                    </p>
                    <a href="{{ route('read-post', $featuredPost->slug) }}"
                        class="inline-flex items-center gap-1.5 font-[family-name:var(--font-ui)] text-sm font-medium text-red-600 mt-5 hover:gap-3 transition-all">
                        Read Article
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"
                            viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center gap-3 pt-5 mt-5 border-t border-stone-200">
                    <img class="w-10 h-10 rounded-full object-cover border-2 border-stone-200"
                        src="{{ asset('images/dummy.jpg') }}" alt="Author">
                    <div>
                        <p class="font-[family-name:var(--font-ui)] text-sm font-medium text-black leading-tight">
                            {{ $featuredPost->user->name }}
                        </p>
                    </div>
                    <span
                        class="ml-auto font-[family-name:var(--font-ui)] text-xs text-stone-400">{{ $featuredPost->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ░░ LATEST ARTICLES ░░ -->
    <section class="max-w-7xl mx-auto px-6 py-12">

        <!-- Section heading -->
        <div class="flex items-center gap-4 mb-8">
            <h2 class="font-[family-name:var(--font-display)] text-2xl font-bold text-black whitespace-nowrap">Latest
                Articles</h2>
            <div class="flex-1 h-px bg-stone-200"></div>
        </div>

        <!-- 3-col post grid -->
        <div class="grid grid-cols-3 gap-7">

            @foreach ($latestPosts as $post)
                <article
                    class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=""
                            class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex gap-2 flex-wrap mb-2.5">
                            @foreach ($post->tags as $tag)
                                <span
                                    class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">
                                    {{ $tag->name }}
                                </span>
                            @endforeach

                        </div>
                        <a href="{{ route('read-post', $post->slug) }}"
                            class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">Why
                            {{ $post->title }}</a>
                        <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">
                            {{ Str::limit($post->content, 100, '...') }}
                        </p>
                        <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                            <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                                src="{{ asset('images/dummy.jpg') }}" alt="user-prifle-image">
                            <div>
                                <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                    {{ $post->user->name }}
                                </p>
                                <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">
                                    {{ $post->category->name }}
                                </p>
                            </div>
                            <span
                                class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">{{ $post->created_at->format('M d') }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
            <div class="footer">
                <a href="{{ route('all-posts') }}"
                    class="inline-flex items-center gap-1.5 font-[family-name:var(--font-ui)] text-sm font-medium text-red-600 mt-5 hover:gap-3 transition-all">
                    see all articles
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"
                        viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </section>
</x-master-layout>