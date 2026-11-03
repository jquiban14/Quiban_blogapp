
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl font-bold text-white">
                Blog Post Reports
            </h2>

            <a href="{{ route('posts.index') }}"
               class="text-sm text-blue-300 hover:text-blue-200">
                ← Back to Blog Posts
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen w-full bg-slate-900 px-4 py-10 text-white sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Blog Post Reports
                </h1>

                <p class="mt-2 text-slate-300">
                    Filter your blog posts and download a PDF or CSV report.
                </p>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-500 bg-red-900/40 p-4 text-red-200">
                    <strong>Please correct the following:</strong>

                    <ul class="mt-2 list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Date Filter --}}
            <div class="mb-8 rounded-xl border border-slate-700 bg-slate-800 p-6 shadow-lg">

                <h3 class="mb-5 text-lg font-semibold text-white">
                    Filter Reports
                </h3>

                <form action="{{ route('posts.reports.index') }}"
                      method="GET">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="start_date"
                                   class="mb-2 block text-sm font-medium text-white">
                                Start Date
                            </label>

                            <input type="date"
                                   id="start_date"
                                   name="start_date"
                                   value="{{ old('start_date', $startDate) }}"
                                   class="w-full rounded-lg border border-slate-600 bg-slate-900 text-white focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="end_date"
                                   class="mb-2 block text-sm font-medium text-white">
                                End Date
                            </label>

                            <input type="date"
                                   id="end_date"
                                   name="end_date"
                                   value="{{ old('end_date', $endDate) }}"
                                   class="w-full rounded-lg border border-slate-600 bg-slate-900 text-white focus:border-blue-500 focus:ring-blue-500">
                        </div>

                    </div>

                    <div class="mt-6 flex flex-wrap gap-3">

                        <button type="submit"
                                class="rounded-lg bg-blue-600 px-5 py-2.5 font-semibold text-white transition hover:bg-blue-700">
                            Generate Report
                        </button>

                        <a href="{{ route('posts.reports.index') }}"
                           class="rounded-lg border border-slate-500 px-5 py-2.5 font-semibold text-white transition hover:bg-slate-700">
                            Reset Filters
                        </a>

                    </div>
                </form>
            </div>

            {{-- Report Summary --}}
            <div class="mb-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div class="rounded-xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
                    <p class="text-sm text-slate-400">
                        Reporting Period
                    </p>

                    <p class="mt-2 text-lg font-semibold text-white">
                        {{ $startDate ?: 'Beginning' }}
                        to
                        {{ $endDate ?: 'Present' }}
                    </p>
                </div>

                <div class="rounded-xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
                    <p class="text-sm text-slate-400">
                        Total Posts
                    </p>

                    <p class="mt-2 text-3xl font-bold text-blue-400">
                        {{ $totalPosts }}
                    </p>
                </div>

            </div>

            {{-- Export Buttons --}}
            <div class="mb-6 flex flex-wrap gap-3">

                <a href="{{ route('posts.reports.pdf', [
                    'start_date' => $startDate,
                    'end_date' => $endDate
                ]) }}"
                   class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">
                    ↓ Export PDF
                </a>

                <a href="{{ route('posts.reports.csv', [
                    'start_date' => $startDate,
                    'end_date' => $endDate
                ]) }}"
                    class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">
                    ↓ Export CSV
                </a>

            </div>

            {{-- Posts Table --}}
            <div class="overflow-hidden rounded-xl border border-slate-700 bg-slate-800 shadow-lg">

                <div class="border-b border-slate-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white">
                        Blog Posts Report
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[750px] text-left text-sm">

                        <thead class="bg-slate-700 text-xs uppercase text-slate-200">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Body Preview</th>
                                <th class="px-6 py-4">Created Date</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-700">

                            @forelse ($posts as $post)
                                <tr class="transition hover:bg-slate-700/50">

                                    <td class="whitespace-nowrap px-6 py-4 text-slate-300">
                                        {{ $post->id }}
                                    </td>

                                    <td class="max-w-xs break-words px-6 py-4 font-medium text-white">
                                        {{ $post->title }}
                                    </td>

                                    <td class="max-w-md break-words px-6 py-4 text-slate-300">
                                        {{ \Illuminate\Support\Str::limit($post->body, 100) }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-slate-300">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-10 text-center text-slate-400">
                                        No posts found for the selected dates.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>

            <div class="mt-6">
                <a href="{{ route('posts.index') }}"
                   class="font-medium text-blue-400 hover:text-blue-300">
                    ← Back to Blog Posts
                </a>
            </div>

        </div>
    </div>

</x-app-layout>
