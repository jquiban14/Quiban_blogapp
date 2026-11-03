
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-white">
                Edit Post
            </h2>

            <a href="{{ route('posts.index') }}"
               class="font-medium text-white hover:text-blue-200">
                Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-900 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <p class="font-semibold uppercase tracking-widest text-blue-400">
                    QUIBAN BLOG / CONTENT
                </p>

                <h1 class="mt-2 text-3xl font-bold text-white">
                    Update Your Post
                </h1>

                <p class="mt-2 text-slate-300">
                    Edit your title and content below.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-700 bg-red-950/50 p-4 text-red-200">
                        <p class="font-semibold">
                            Please correct the following:
                        </p>

                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title"
                               class="mb-2 block text-sm font-medium text-white">
                            Post Title
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $post->title) }}"
                            required
                            maxlength="255"
                            class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3 text-white placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >

                        @error('title')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body"
                               class="mb-2 block text-sm font-medium text-white">
                            Post Content
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            rows="8"
                            required
                            class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3 text-white placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >{{ old('body', $post->body) }}</textarea>

                        @error('body')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col-reverse gap-3 border-t border-slate-700 pt-6 sm:flex-row sm:justify-end">

                        <a href="{{ route('posts.index') }}"
                           class="inline-flex justify-center rounded-lg border border-slate-600 px-5 py-3 font-semibold text-white transition hover:bg-slate-700">
                            Cancel
                        </a>

                        <button type="submit"
                                class="inline-flex justify-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">
                            Update Post
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
