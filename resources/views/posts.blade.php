<x-master-layout title="All Posts">
  <section class="max-w-7xl mx-auto px-6 py-12">
    <div class="flex items-center gap-4 mb-8">
      <h1 class="font-[family-name:var(--font-display)] text-2xl font-bold text-black whitespace-nowrap">All
        Articles</h1>
      <div class="flex-1 h-px bg-stone-200"></div>
      <span class="font-[family-name:var(--font-ui)] text-xs text-stone-400 whitespace-nowrap">
        {{ $posts->total() }} articles
      </span>
    </div>

    <div class="grid grid-cols-3 gap-7">
      @forelse ($posts as $post)
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
              class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">
              {{ $post->title }}
            </a>

            <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">
              {{ Str::limit($post->content, 100, '...') }}
            </p>

            <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
              <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                src="{{ asset('images/dummy.jpg') }}" alt="author">
              <div>
                <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                  {{ $post->user->name }}
                </p>
                <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">
                  {{ $post->category->name }}
                </p>
              </div>
              <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">
                {{ $post->created_at->format('M d, Y') }}
              </span>
            </div>
          </div>
        </article>
      @empty
        <p class="text-red-500 text-center text-lg font-medium w-full">Sorry No Aricles Found!</p>
      @endforelse
    </div>
    <div class="paginaiton mt-5">
      {{ $posts->links() }}
    </div>
  </section>
</x-master-layout>