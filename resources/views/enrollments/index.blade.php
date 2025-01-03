<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ $student->full_name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status :status="session('status')" />
            <x-auth-validation-errors />
            <div class="flex space-x-4">
                <x-card class="w-1/3">
                    <h1 class="uppercase mb-2 font-bold text-xl">ENROLL IN (CURRENT SEMESTER A.Y. IKAW NA BAHALA HAHA)
                    </h1>
                    <form action="{{ route('students.enrollments.store', $student) }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="year_level" :value="__('Year Level')" />
                            <select name="year_level" id="year_level" class="block w-full">
                                @foreach (['1st', '2nd', '3rd', '4th'] as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="stud_type" :value="__('Student Type')" />
                            <select name="stud_type" id="stud_type" class="block w-full">
                                @foreach (['Irregular', 'Regular'] as $stud_type)
                                    <option value="{{ $stud_type }}">{{ $stud_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="program_id" :value="__('Program')" />
                            <select name="program_id" id="program_id" class="block w-full">
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                </x-card>
                <x-card class="w-2/3">
                    <h1 class="uppercase mb-2 font-bold text-xl">ENROLLMENT HISTORY</h1>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Year Level</th>
                                    <th scope="col" class="px-6 py-3">Semester</th>
                                    <th scope="col" class="px-6 py-3">A.Y.</th>
                                    <th scope="col" class="px-6 py-3">Student Type</th>
                                    <th scope="col" class="px-6 py-3">Subjects/Schedule</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->enrollments as $enrollment)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ ++$i }}</td>
                                        <td class="px-6 py-4">{{ $enrollment->year_level }}</td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4">{{ $enrollment->stud_type }}</td>
                                        <td class="px-6 py-4"><x-primary-button>Schedule</x-primary-button></td>
                                        <td class="px-6 py-4">Active/Inactive</td>
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
