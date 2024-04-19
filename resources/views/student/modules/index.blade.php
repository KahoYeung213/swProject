<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Modules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-6 mt-6">
                @forelse ($modules as $module)
                <a href="{{ route('student.modules.show', $module) }}" class="my-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg hover:shadow-md hover:bg-gray-100 cursor-pointer flex flex-col justify-center items-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105" style="text-decoration: none;">
                    <div class="p-6 flex-grow text-left">
                        <div class="w-200 h-200 flex items-center justify-center mb-4">
                            @if ($module->module_image)
                                <img src="{{ asset($module->module_image) }}" alt="{{ $module->module_name }}" class="object-cover w-full h-full">
                            @else
                                No Image
                            @endif
                        </div>
                        <h2 class="font-bold text-xl">{{ $module->module_name }}</h2>
                        <p class="text-l font-bold text-black">Credits: {{ $module->credits }}</p>
                    </div>
                </a>
                @empty
                <p>No modules</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
