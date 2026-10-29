
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-white">
                Blog Posts
            </h2>

            <a href="{{ route('dashboard') }}"
              class="text-sm font-medium text-white-300 hover:text-white-200">
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-900 py-10">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
    <div>
        <p class="text-sm font-semibold uppercase tracking-widest text-blue-400">
            QUIBAN BLOG / CONTENT
        </p>

        <h1 class="mt-2 text-3xl font-bold text-white">
            All Blog Posts
        </h1>

        <p class="mt-2 text-slate-300 text-white">
            Create, read, update, and manage your articles.
        </p>
    </div>

    <a href="{{ route('posts.create') }}"
       class="inline-flex shrink-0 items-center justify-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">
        + Create New Post
    </a>
</div>

            @if (session('success'))
                <div class="rounded-lg border border-green-700 bg-green-900/40 px-4 py-3 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            @if ($posts->isEmpty())
                <div class="rounded-2xl border border-slate-700 bg-slate-800 p-10 text-center">
                    <h2 class="text-xl font-semibold text-white">
                        No posts yet
                    </h2>

                    <p class="mt-2 text-slate-400">
                        Create your first blog post to get started.
                    </p>

                    <a href="{{ route('posts.create') }}"
                       class="mt-5 inline-flex rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700">
                        Write Your First Post
                    </a>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($posts as $post)
                        <article class="flex flex-col rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg transition hover:-translate-y-1 hover:border-blue-500">

                            <div class="flex-1">
                                <p class="text-xs font-semibold uppercase tracking-wider text-blue-400">
                                    Blog Article
                                </p>

                                <h2 class="mt-3 break-words text-xl font-bold text-white">
                                    {{ $post->title }}
                                </h2>

                                <p class="mt-3 whitespace-pre-line break-words leading-relaxed text-slate-300">{{ \Illuminate\Support\Str::limit($post->body, 180) }}</p>

                                <p class="mt-4 text-xs text-slate-400">
                                    Created {{ $post->created_at->format('M d, Y') }}
                                </p>
                            </div>

                            <div class="mt-6 flex flex-wrap items-center gap-3 border-t border-slate-700 pt-4">
                                <a href="{{ route('posts.show', $post) }}"
                                   class="text-sm font-semibold text-blue-400 hover:text-blue-300">
                                    View
                                </a>

                                @auth
                                    <a href="{{ route('posts.edit', $post) }}"
                                       class="text-sm font-semibold text-blue-400 hover:text-blue-300">
                                        Edit
                                    </a>

                                    <form action="{{ route('posts.destroy', $post) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-sm font-semibold text-blue-400 hover:text-blue-300">
                                            Delete
                                        </button>
                                    </form>
                                @endauth
                            </div>

                        </article>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
