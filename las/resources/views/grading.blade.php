<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grading') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mt-4 text-lg font-semibold">{{ __('Students') }}</h3>

                    <!-- Filter and Search Form -->
                    <form method="GET" action="{{ route('grading') }}" id="filterForm" class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label for="groups" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-0 sm:mr-4">{{ __('Filter by Group') }}</label>
                            <div class="flex-grow">
                                <select id="groups" name="groups[]" multiple class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" onchange="document.getElementById('filterForm').submit();">
                                    <option value="">{{ __('All') }}</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->group }}" {{ in_array($group->group, request()->groups ?? []) ? 'selected' : '' }}>
                                            {{ 'Group: ' . $group->group }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-0 sm:ml-4 sm:mr-4">{{ __('Search by Name') }}</label>
                            <div class="flex-grow">
                                <input type="text" id="search" name="search" value="{{ request()->search }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" placeholder="{{ __('Enter student name') }}">
                            </div>
                            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">{{ __('Search') }}</button>
                        </div>
                    </form>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($students as $student)
                            <a href="{{ route('students.grade', $student) }}" class="bg-white dark:bg-gray-700 shadow-md rounded-lg overflow-hidden block">
                                <div class="flex items-center p-4">
                                    @if ($student->photo)
                                        <img class="w-16 h-16 rounded-full object-cover mr-4" src="data:image/jpeg;base64,{{ base64_encode($student->photo) }}" alt="{{ $student->first_name }}">
                                    @else
                                        <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/150" alt="{{ $student->first_name }}">
                                    @endif
                                    <div>
                                        <h4 class="text-lg font-semibold">{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}</h4>
                                        @if ($student->latestSchoolCareer)
                                            <p class="text-gray-600 dark:text-gray-400">{{ 'Group: ' . $student->latestSchoolCareer->group->group }}</p>
                                        @else
                                            <p class="text-gray-600 dark:text-gray-400">{{ __('No school career available') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>