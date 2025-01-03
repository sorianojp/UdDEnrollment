<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Colleges') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status :status="session('status')" />
            <x-auth-validation-errors />
            <div class="flex space-x-4">
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Add College</h1>
                    <form action="{{ route('colleges.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input type="text" name="code" placeholder="SITE" class="block w-full"
                                autofocus />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input type="text" name="name"
                                placeholder="SCHOOL OF INFORMATION TECHNOLOGY EDUCATION" class="block w-full" />
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                </x-card>
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Colleges</h1>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Code</th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Programs</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colleges as $college)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ ++$i }}</td>
                                        <td class="px-6 py-4">{{ $college->code }}</td>
                                        <td class="px-6 py-4">{{ $college->name }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('colleges.programs.index', $college) }}">
                                                <x-primary-button>Programs</x-primary-button>
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
