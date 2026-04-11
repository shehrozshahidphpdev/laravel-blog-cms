<x-master-layout title="Home Page">
    <!-- ░░ HERO FEATURED POST ░░ -->
    <section class="max-w-7xl mx-auto px-6 pt-10">
        <div class="grid grid-cols-[1fr_340px] border border-stone-200">

            <!-- Cover image -->
            <div class="relative overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900&q=80" alt="Featured post"
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
                        Technology · 8 min read</p>
                    <h1
                        class="font-[family-name:var(--font-display)] text-[1.65rem] font-bold leading-tight text-black mt-2 mb-3">
                        The Quiet Revolution Happening Inside Your Browser</h1>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500">
                        Web browsers have silently become the most powerful software on your device. From AI inference
                        to real-time collaboration, the humble browser is rewriting the rules of what software can be.
                    </p>
                    <a href="#"
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
                        src="https://i.pravatar.cc/80?img=11" alt="Author">
                    <div>
                        <p class="font-[family-name:var(--font-ui)] text-sm font-medium text-black leading-tight">Layla
                            Mercer</p>
                        <p class="font-[family-name:var(--font-ui)] text-xs text-stone-500">Senior Tech Writer</p>
                    </div>
                    <span class="ml-auto font-[family-name:var(--font-ui)] text-xs text-stone-400">Apr 10, 2026</span>
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

            <!-- Card 1 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">Technology</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">AI</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">Why
                        AI Is Still Terrible at Telling Time</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">
                        Language models have a bizarre relationship with time. They can write poetry but can't tell you
                        what day it is without hallucinating.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=3" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                Omar Sheikh</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">AI Correspondent</p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 9</span>
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1532153975070-2e9ab71f1b14?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">Science</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">Space</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">The
                        Case for Going Back to the Moon — and Staying</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">Lunar
                        colonization sounds like science fiction. But a closer look at current programs suggests it's
                        closer than you think.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=5" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                Priya Anand</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Science Editor</p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 8</span>
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">Culture</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">Books</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">Reading
                        is Not a Hobby. It's an Act of Resistance.</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">In an
                        age of algorithmic feeds and shrinking attention spans, sitting down with a book is quietly
                        becoming a radical act.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=9" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                Sarah Okafor</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Culture Writer</p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 7</span>
                    </div>
                </div>
            </article>

            <!-- Card 4 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">Finance</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">Economy</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">The
                        Hidden Cost of Cheap Fast Fashion on Global Markets</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">What
                        you pay at the checkout isn't what the world pays for your t-shirt. A deep dive into the
                        economics of disposable clothing.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=15" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                James Holden</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Economics Reporter
                            </p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 6</span>
                    </div>
                </div>
            </article>

            <!-- Card 5 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1551269901-5c5e14c25df7?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">Health</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">Mind</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">Why
                        Boredom Is Exactly What Your Brain Needs Right Now</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">We have
                        engineered boredom out of our lives. Neuroscience says this might be one of the worst things
                        we've ever done to ourselves.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=20" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                Nina Wallace</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Health Editor</p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 5</span>
                    </div>
                </div>
            </article>

            <!-- Card 6 -->
            <article
                class="bg-white border border-stone-200 flex flex-col hover:-translate-y-0.5 hover:shadow-[4px_4px_0_#dc2626] transition-all duration-200">
                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&q=75" alt=""
                        class="w-full h-48 object-cover block hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex gap-2 flex-wrap mb-2.5">
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-red-50 text-red-600 px-2 py-0.5">History</span>
                        <span
                            class="font-[family-name:var(--font-ui)] text-[10px] font-medium tracking-widest uppercase bg-stone-100 text-stone-500 px-2 py-0.5">Society</span>
                    </div>
                    <a href="#"
                        class="font-[family-name:var(--font-display)] text-lg font-bold leading-snug text-black hover:text-red-600 transition-colors mb-2">The
                        Library That Was Burned Twice and Still Survived</a>
                    <p class="font-[family-name:var(--font-body)] text-sm leading-relaxed text-stone-500 flex-1">The
                        story of the great library isn't one of tragedy — it's one of resilience. Knowledge, it turns
                        out, is remarkably hard to destroy.</p>
                    <div class="flex items-center gap-2.5 mt-4 pt-4 border-t border-stone-100">
                        <img class="w-8 h-8 rounded-full object-cover border border-stone-200 shrink-0"
                            src="https://i.pravatar.cc/60?img=25" alt="">
                        <div>
                            <p class="font-[family-name:var(--font-ui)] text-xs font-medium text-black leading-tight">
                                Daniel Cruz</p>
                            <p class="font-[family-name:var(--font-ui)] text-[10px] text-stone-400">History Contributor
                            </p>
                        </div>
                        <span class="ml-auto font-[family-name:var(--font-ui)] text-[10px] text-stone-400">Apr 4</span>
                    </div>
                </div>
            </article>

        </div>
    </section>
</x-master-layout>