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
                    <h1 class="uppercase mb-2 font-bold text-xl">Add Payment Description</h1>
                    <form action="{{ route('paymentdescriptions.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input type="text" name="description" placeholder="Enrollment Fee"
                                class="block w-full" autofocus />
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                </x-card>
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Payment Descriptions</h1>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentDescriptions as $paymentDescription)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ ++$i }}</td>
                                        <td class="px-6 py-4">{{ $paymentDescription->description }}</td>
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
