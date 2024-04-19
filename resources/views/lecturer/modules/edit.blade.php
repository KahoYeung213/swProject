<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('lecturer.modules.update', $module->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-text-input
                        type="text"
                        name="module_name"
                        field="module_name"
                        placeholder="Module Name"
                        class="w-full"
                        autocomplete="off"
                        :value="$module->module_name">
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="credits"
                        field="credits"
                        placeholder="Credit Amount"
                        class="w-full"
                        autocomplete="off"
                        :value="$module->credits">
                    </x-text-input>

                    <x-file-input
                        type="file"
                        name="module_image"
                        placeholder="Module Image"
                        class="w-full mt-6"
                        field="module_image">
                    </x-file-input>

                    <div class="mt-6">
                        <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course:</label>
                        <select id="course_id" name="course_id" class="form-select mt-1 block w-full">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ $module->course_id == $course->id ? 'selected' : '' }}>
                                    {{ $course->course_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <x-primary-button class="mt-6">Save Module</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
