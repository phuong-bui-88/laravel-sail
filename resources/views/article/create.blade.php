<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add new article') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf

                    <div>
                        <x-label for="title" :value="__('Title')"/>

                        <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                 :value="old('title')" required/>
                    </div>

                    <x-button class="mt-4">
                        {{ __('Submit') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</div>
