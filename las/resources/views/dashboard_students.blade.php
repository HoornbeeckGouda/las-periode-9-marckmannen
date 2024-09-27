<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as $user->name! (student ID: $student->id)") }}
                    
                    <h3 class="mt-4 text-lg font-semibold">{{ __('Your Results') }}</h3>
                    <table class="min-w-full mt-2 bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Subject') }}</th>
                                <th class="px-4 py-2">{{ __('Career') }}</th>
                                <th class="px-4 py-2">{{ __('Result') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td class="border px-4 py-2">{{ $result->subject->name }}</td>
                                    <td class="border px-4 py-2">{{ $result->schoolCareer->name }}</td>
                                    <td class="border px-4 py-2">{{ $result->result }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
