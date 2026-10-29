
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-white">
                Quiban Blog Dashboard
            </h2>

            <a href="{{ route('posts.index') }}"
               class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                View Blog Posts
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-900 py-10">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-blue-400">
                    Quiban Blog / Overview
                </p>

                <h1 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                    Welcome back, {{ auth()->user()->name }}!
                </h1>

                <p class="mt-3 text-slate-400">
                    Manage your blog posts from one place.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
                    <p class="text-sm font-medium text-slate-400">
                        Total Blog Posts
                    </p>

                    <p class="mt-4 text-4xl font-bold text-white">
                        {{ \App\Models\Post::count() }}
                    </p>

                    <p class="mt-2 text-sm text-blue-400">
                        Posts in your database
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
                    <p class="text-sm font-medium text-slate-400">
                        Account
                    </p>

                    <p class="mt-4 break-words text-xl font-semibold text-white">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="mt-2 text-sm text-green-400">
                        Logged in successfully
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
                    <p class="text-sm font-medium text-slate-400">
                        Quick Action
                    </p>

                    <a href="{{ route('posts.create') }}"
                       class="mt-4 inline-flex items-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">
                        + Create New Post
                    </a>
                </div>

            </div>

            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg sm:p-8">
                <h2 class="text-xl font-bold text-white">
                    Manage Your Blog
                </h2>

                <p class="mt-2 text-slate-400">
                    View your posts, update content, and manage your blog.
                </p>

                <a href="{{ route('posts.index') }}"
                   class="mt-6 inline-flex items-center rounded-lg border border-slate-600 px-5 py-3 font-semibold text-white transition hover:bg-slate-700">
                    View All Posts →
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
