<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            

           
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <x-primary-button class="mb-4"><a href="{{ route('lecturer.courses.edit', $course) }}">Edit Course</a></x-primary-button>

                    <form action="{{ route('lecturer.courses.destroy', $course) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button class="mb-4" onclick="return confirm('Are you sure you want to delete this course?')">Delete</x-primary-button>
                    </form>
                    <table class="ms-6 table table-hover">
                        <tr>
                            <td rowspan="6">
                                <img src="{{ asset($course->course_image) }}" alt="{{ $course->course_name }}" width="200">
                            </td>
                        </tr>
                    
                    </table>
                    <div>
                    <table class="ms-6 table table-hover">
                        <tr>
                            <td class="text-3xl font-bold">{{ $course->course_name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Number Of Students: </td>
                            <td>{{ $course->number_of_students }}</td>
                        </tr>
                    </table>
                    </div>
                    
                    <h1 class="mt-5 text-4xl font-bold text-center">Modules</h1>
                    <button onclick="window.location.href = '{{ route('lecturer.modules.create') }}'" class="ms-6 btn relative inline-flex items-center justify-start overflow-hidden font-medium transition-all bg-indigo-100 rounded hover:bg-white group py-1.5 px-2.5">
                    <span class="w-56 h-48 rounded bg-indigo-600 absolute bottom-0 left-0 translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                    <span class="relative w-full text-left text-indigo-600 transition-colors duration-300 ease-in-out group-hover:text-white">Add a Module</span>
                 </button>
                    <div class="grid grid-cols-3 gap-6 mt-6">
                        
                        @foreach ($course->modules as $module)
                            <a href="{{ route('lecturer.modules.show', $module) }}" class="my-6 bg-white border-b border-gray-200 shadow-xl sm:rounded-lg hover:shadow-md hover:bg-gray-100 cursor-pointer flex flex-col justify-center items-center transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105" style="text-decoration: none;">
                                <div class="p-6 flex-grow text-left">
                                    <div class="w-200 h-200 flex items-center justify-center mb-4">
                                        @if ($module->module_image)
                                            <img src="{{ asset($module->module_image) }}" alt="{{ $module->module_name }}" class="object-cover w-200 h-200">
                                        @else
                                            No Image
                                        @endif
                                    </div>
                                    <h2 class="font-bold text-xl">{{ $module->module_name }}</h2>
                                    <p class="text-l font-bold text-black">Credits: {{ $module->credits }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
