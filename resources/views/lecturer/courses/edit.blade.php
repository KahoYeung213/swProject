<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('lecturer.courses.update', $module) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                        type="text"
                        name="module_name"
                        field="module_name"
                        placeholder="module name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('module_name', $module->module_name)"></x-text-input>


                    <x-text-input
                        name="credits"
                        rows="10"
                        field="credits"
                        placeholder="credits..."
                        class="w-full mt-6"
                        :value="@old('credits', $module->credits)">
                    </x-text-input>
                  
                    <x-file-input
                        type="file"
                        name="module_image"
                        placeholder="module_image"
                        class="w-full mt-6"
                        field="module_image"
                        :value="@old('module_image', $module->module_image)">>
                    </x-file-input>

                    

                    <x-primary-button class="mt-6">save</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
