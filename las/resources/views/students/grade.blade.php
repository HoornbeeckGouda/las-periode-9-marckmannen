<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grade Student') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mt-4 text-lg font-semibold">{{ __('Grade Student') }}</h3>
                    <p>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}</p>
                    
                    <!-- Grading Form -->
                    <form method="POST" action="{{ route('students.grade.create', $student) }}">
                        @csrf
                        <div class="mt-4">
                            <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Grade') }}</label>
                            <input type="text" id="grade" name="grade" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <input type="hidden" name="school_career_id" value="{{ $student->school_career_id }}">
                            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>