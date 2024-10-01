<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results and  School Careers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as $user->name! (student ID: $student->id)") }}
                    <h3 class="mt-4 text-lg font-semibold">{{ __('Your Results') }}</h3>
                    
                    <form method="GET" action="{{ route('dashboard') }}" id="filterForm">
                        <label for="schoolCareer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Select School Career') }}</label>
                        <select id="schoolCareer" name="schoolCareer" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" onchange="document.getElementById('filterForm').submit();">
                            <option value="">{{ __('All') }}</option>
                            @foreach ($student->schoolCareers->sortByDesc('courseYear.end_date') as $schoolCareer)
                                <option value="{{ $schoolCareer->id }}" {{ request('schoolCareer') == $schoolCareer->id ? 'selected' : '' }}>
                                    {{ 'Course: ' . $schoolCareer->course->course . ', Year: ' . $schoolCareer->courseYear->course_year . ', Group: ' . $schoolCareer->group->group }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    @foreach ($student->schoolCareers->sortByDesc('courseYear.end_date') as $schoolCareer)
                        @if (!request('schoolCareer') || request('schoolCareer') == $schoolCareer->id)
                            <h4 class="mt-4 text-lg font-semibold">
                                {{ 'Course: ' . $schoolCareer->course->course . ', Year: ' . $schoolCareer->courseYear->course_year . ', Group: ' . $schoolCareer->group->group }}
                            </h4>
                            <table class="min-w-full mt-2 bg-white dark:bg-gray-800 border-collapse">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700">
                                        <th class="px-4 py-2 border-b-2 border-gray-300 dark:border-gray-600">{{ __('Subject') }}</th>
                                        <th class="px-4 py-2 border-b-2 border-gray-300 dark:border-gray-600">{{ __('Result') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results[$schoolCareer->id] ?? [] as $result)
                                        <tr class="{{ $loop->even ? 'bg-gray-100 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
                                            <td class="w-1/3 border px-4 py-2">{{ $result->subject->subject }}</td>
                                            <td class="w-1/3 border px-4 py-2">{{ $result->result }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>