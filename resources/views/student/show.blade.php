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
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                            <td rowspan="6">
                                <img src="{{ asset($module->module_image) }}"
                                alt="{{$module->module_name}}" width="100">
                            </td>
                            </tr>
                            <tr>
                                <td class="font-bold ">module_name  </td>
                                <td>{{ $module->module_name }}</td>
                            </tr>
                           
                            <tr>
                                <td class="font-bold">credits </td>
                                <td>{{ $module->credits }}</td>
                            </tr>
                        </tbody>

                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

