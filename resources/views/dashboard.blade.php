<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container bg-white p-6 text-white-900">
                    <img src="https://www.logomaker.com/api/main/images/1j+ojFVDOMkX9Wytexe43D6kh...GErx5LmR7KwXs1M3EMoAJtlyEug...Rr8fk6"
                    alt="Your Logo" class="mx-auto block h-200 w-auto">
                    <h2 class="text-lg text-center">FreeLearn provides free online courses</h2>
                    <h3 class="text-md font-semibold mb-4">FreeLearn courses are :</h3>

                    <ul class="mb-4" style="list-style-type: disc;">
                        <li>Free</li>
                        <li>Easily Accessable</li>
                        <li>Self-Paced Learning</li>
                    </ul>

                    <h3 class="text-md mb-4"></h3>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
