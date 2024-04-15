<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Modules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
        <a href="{{ route('modules.create') }}" class="btn-link btn-lg mb-2 bg-white text-black">Add a Module</a>
            @forelse ($modules as $module)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('student.modules.show', $module) }}">{{ $module->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $module->module_name }}
                        {{$module->credits}}
                        @if ($module->module_image)
                        <img src="{{ $module->module_image }}" 
                        alt="{{ $module->module_name }}" width="100">
                    @else
                        No Image
                    @endif
                    </p>

                </div>
            @empty
            <p>No books</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>