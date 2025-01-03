<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status :status="session('status')" />
            <x-auth-validation-errors />
            <div class="flex space-x-4">
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Register</h1>
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input type="text" name="last_name" class="block w-full" autofocus />
                        </div>
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input type="text" name="first_name" class="block w-full" />
                        </div>
                        <div>
                            <x-input-label for="middle_name" :value="__('Middle Name')" />
                            <x-text-input type="text" name="middle_name" class="block w-full" />
                        </div>
                        <div>
                            <x-input-label for="student_no" :value="__('Student Number')" />
                            <x-text-input type="text" name="student_no" class="block w-full" />
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                </x-card>
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Registered Students</h1>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Student No</th>
                                    <th scope="col" class="px-6 py-3">Enrollment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ ++$i }}</td>
                                        <td class="px-6 py-4">{{ $student->full_name }}</td>
                                        <td class="px-6 py-4">{{ $student->student_no }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('students.enrollments.index', $student) }}">
                                                <x-primary-button type="button">Enrollment</x-primary-button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
