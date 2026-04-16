<x-master-layout title="{{ $post->title }}">

  <section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-[1fr_320px] gap-10 items-start">
      <article>
        <a href="{{ route('all-posts') }}"
          class="inline-flex items-center gap-1.5 font-[family-name:var(--font-ui)] text-sm text-stone-400 hover:text-black transition-colors mb-6">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path d="M15 19l-7-7 7-7" />
          </svg>
          Back to Articles
        </a>

        <div class="flex items-center gap-3 flex-wrap mb-4">
          <span class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-red-600">
            {{ strtoupper($post->category->name) }}
          </span>
          @foreach ($post->tags as $tag)
            <span
              class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">
              {{ $tag->name }}
            </span>
          @endforeach
        </div>

        <h1 class="font-[family-name:var(--font-display)] text-3xl font-bold leading-tight text-black mb-5">
          {{ $post->title }}
        </h1>
        <div class="flex items-center gap-3 mb-7 pb-7 border-b border-stone-200">
          <img class="w-10 h-10 rounded-full object-cover border-2 border-stone-200"
            src="{{ asset('images/dummy.jpg') }}" alt="author">
          <div>
            <p class="font-[family-name:var(--font-ui)] text-sm font-medium text-black leading-tight">
              {{ $post->user->name }}
            </p>
            <p class="font-[family-name:var(--font-ui)] text-xs text-stone-400">
              {{ $post->created_at->format('M d, Y') }}
            </p>
          </div>
        </div>

        <div class="overflow-hidden mb-8 border border-stone-200">
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
            class="w-full h-[420px] object-cover block">
        </div>

        <div class="font-[family-name:var(--font-body)] text-base leading-relaxed text-stone-700 space-y-4">
          {!! $post->content !!}
        </div>

      </article>

      <aside class="sticky top-6 space-y-8">

        <div class="border border-stone-200 p-6">
          <h3
            class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-stone-400 mb-4">
            About the Author
          </h3>
          <div class="flex items-center gap-3 mb-3">
            <img class="w-12 h-12 rounded-full object-cover border-2 border-stone-200"
              src="{{ asset('images/dummy.jpg') }}" alt="author">
            <div>
              <p class="font-[family-name:var(--font-ui)] text-sm font-medium text-black leading-tight">
                {{ $post->user->name }}
              </p>
              <p class="font-[family-name:var(--font-ui)] text-xs text-stone-400">
                {{ $post->user->email }}
              </p>
            </div>
          </div>
        </div>



        {{-- Tags Cloud --}}
        <div class="border border-stone-200 p-6">
          <h3
            class="font-[family-name:var(--font-ui)] text-xs font-medium tracking-widest uppercase text-stone-400 mb-4">
            Tags
          </h3>
          <div class="flex flex-wrap gap-2">
            @foreach ($post->tags as $tag)
              <span
                class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-3 py-1.5 border border-red-100">
                {{ $tag->name }}
              </span>
            @endforeach
          </div>
        </div>

      </aside>

    </div>
    {{-- Comment Section --}}
    <div class="mt-12 pt-10 border-t border-stone-200">

      {{-- Section Header --}}
      <div class="flex items-center gap-4 mb-8">
        <h2 class="font-[family-name:var(--font-display)] text-xl font-bold text-black whitespace-nowrap">
          Comments
        </h2>
        <span class="font-[family-name:var(--font-ui)] text-xs text-stone-400">{{ count($post->comments) }}
          comments</span>
        <div class="flex-1 h-px bg-stone-200"></div>
      </div>

      <form class="mb-10" method="post" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="flex gap-4">
          <img class="w-10 h-10 rounded-full object-cover border-2 border-stone-200 shrink-0 mt-1"
            src="{{ asset('images/dummy.jpg') }}" alt="your avatar">
          <div class="flex-1">
            <textarea rows="3" placeholder="Share your thoughts..." name="comment" class="w-full border border-stone-200 px-4 py-3 text-sm
                           font-[family-name:var(--font-body)] text-stone-700
                           placeholder-stone-400 focus:outline-none focus:ring-2
                           focus:ring-red-600 focus:border-transparent
                           transition resize-none">
                          {{ old('comment') }}
                          </textarea>
            @error('login_error')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
            @error('comment')
              {{ $message }}
            @enderror
            @if(session('success'))
              <p class="text-green-500">{{ session('success') }}</p>
            @endif
            <div class="flex justify-end mt-2">
              <button type="submit" class="cursor-pointer inline-flex items-center gap-2 bg-black text-white
                               font-[family-name:var(--font-ui)] text-xs font-medium
                               tracking-widest uppercase px-5 py-2.5
                               hover:bg-red-600 active:scale-95 transition-all">
                Post Comment
              </button>
            </div>
          </div>
        </div>
      </form>

      <div class="space-y-0 divide-y divide-stone-100">

        @forelse($post->comments as $comment)
          <div class="flex gap-4 py-6">
            <img class="w-10 h-10 rounded-full object-cover border-2 border-stone-200 shrink-0 mt-0.5"
              src="{{ asset('images/dummy.jpg') }}" alt="John Doe">
            <div class="flex-1">
              <div class="flex items-center justify-between gap-3 mb-2">
                <div class="info">

                  <span class="font-[family-name:var(--font-ui)] text-sm font-medium text-black">
                    {{ $comment->user->name }}
                  </span>
                  {{-- <span class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">
                    {{ $comment->created_at->format('M d, Y') }}
                  </span> --}}
                  <span class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">
                    {{ $comment->created_at->diffForHumans() }} @if($comment->status == 'pending')
                      <span
                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">pending</span>

                    @endif
                  </span>
                </div>
                @if($comment->user->id == auth()->user()->id)
                  <form method="post" action="{{ route('comments.destroy', $comment->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="cursor-pointer ml-auto font-[family-name:var(--font-ui)] text-[10px]
                                                                                                                                                                                         text-stone-400 hover:text-red-600 tracking-widest
                                                                                                                                                   uppercase transition-colors">
                      Delete
                    </button>
                  </form>
                @endif

              </div>
              <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-600">
                {{ $comment->comment }}
              </p>
            </div>
          </div>
        @empty
          <p class="text-red-500">
            No comments found !
          </p>
        @endforelse
      </div>
    </div>
  </section>


</x-master-layout>