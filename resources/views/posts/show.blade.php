
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-white">
                Read Blog Post
            </h2>

            <a href="{{ route('posts.index') }}"
               class="font-medium text-white hover:text-blue-300">
                ← Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-900 py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            <article class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg sm:p-10">

                <p class="text-sm font-semibold uppercase tracking-widest text-white">
                    QUIBAN BLOG / ARTICLE
                </p>

                <h1 class="mt-4 break-words text-3xl font-bold text-white sm:text-4xl">
                    {{ $post->title }}
                </h1>

                <p class="mt-4 text-sm text-white">
                    Published {{ $post->created_at->format('F d, Y') }}
                </p>

                <div class="my-8 border-t border-slate-600"></div>

                <div class="whitespace-pre-line break-words leading-8 text-white">
                    {{ $post->body }}
                </div>

                <div class="mt-10 flex flex-wrap gap-3 border-t border-slate-600 pt-6">

                    <a href="{{ route('posts.index') }}"
                       class="rounded-lg border border-slate-500 px-5 py-3 font-semibold text-white hover:bg-slate-700">
                        Back to Posts
                    </a>

                    @auth
                        <a href="{{ route('posts.edit', $post) }}"
                           class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700">
                            Edit Post
                        </a>
                    @endauth

                </div>

            </article>

        </div>
    </div>
</x-app-layout>
