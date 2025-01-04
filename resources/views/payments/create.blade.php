<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Make Payment for ') . $student->full_name }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status :status="session('status')" />
            <x-auth-validation-errors />
            <div class="flex space-x-4">
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Make Payment</h1>
                    <form action="{{ route('students.payments.store', $student) }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="payment_description_id" :value="__('Payment Description')" />
                            <select name="payment_description_id" class="block w-full">
                                @foreach ($paymentDescriptions as $paymentDescription)
                                    <option value="{{ $paymentDescription->id }}">{{ $paymentDescription->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('Amount')" />
                            <x-text-input type="number" name="amount" class="block w-full" step="0.01" />
                        </div>
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit">Submit Payment</x-primary-button>
                        </div>
                    </form>
                </x-card>
                <x-card class="w-1/2">
                    <h1 class="uppercase mb-2 font-bold text-xl">Payment History</h1>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Payment Description</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->payments as $payment)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $payment->paymentDescription->description }}</td>
                                        <td class="px-6 py-4">{{ $payment->amount }}</td>
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
