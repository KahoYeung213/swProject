<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button onclick="window.location.href = '{{ route('lecturer.courses.create') }}'" class="btn relative inline-flex items-center justify-start overflow-hidden font-medium transition-all bg-indigo-100 rounded hover:bg-white group py-1.5 px-2.5">
                <span class="w-56 h-48 rounded bg-indigo-600 absolute bottom-0 left-0 translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span class="relative w-full text-left text-indigo-600 transition-colors duration-300 ease-in-out group-hover:text-white">Add a Course</span>
            </button>
            <div class="grid grid-cols-3 gap-6 mt-6">
                @forelse ($courses as $course)
                <a href="{{ route('lecturer.courses.show', $course) }}" class="my-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg hover:shadow-md hover:bg-gray-100 cursor-pointer flex flex-col justify-center items-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105" style="text-decoration: none;">
                    <div class="p-6 flex-grow text-left">
                        <div class="w-200 h-200 flex items-center justify-center mb-4">
                            @if ($course->course_image)
                                <img src="{{ asset($course->course_image) }}" alt="{{ $course->course_name }}" class="object-cover w-full h-full">
                            @else
                                No Image
                            @endif
                        </div>
                        <h2 class="font-bold text-xl">{{ $course->course_name }}</h2>
                        <p class="text-l font-bold text-black">Number Of Students: {{ $course->number_of_students }}</p>
                    </div>
                </a>
                @empty
                <p>No Courses</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
