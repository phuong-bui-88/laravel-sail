<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Articles') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
                    <a href="{{ route('articles.create') }}" class="underline">Add new article</a>
                    <br /><br />
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50">
                                <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50">
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                        @foreach($articles as $article)
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $article->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    <a href="{{ route('articles.edit', $article) }}" class="underline">Edit</a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="underline" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
