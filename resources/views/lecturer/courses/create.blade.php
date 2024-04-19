<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('lecturer.courses.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        
                    <x-text-input
                        type="text"
                        name="course_name"
                        field="course_name"
                        placeholder="Course Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('course_name')">
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="number_of_students"
                        field="number_of_students"
                        placeholder="Number of Students"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('number_of_students')">
                    </x-text-input>
                  
                    <x-file-input
                        type="file"
                        name="course_image"
                        placeholder="course Image"
                        class="w-full mt-6"
                        field="course_image"
                        :value="@old('course_image')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Save Courses</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>