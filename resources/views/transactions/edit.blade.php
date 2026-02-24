<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount</label>
                                <input type="number" name="amount" value="{{ old('amount', $transaction->amount) }}" step="0.01"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('amount')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <select name="status" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="pending" {{ old('status', $transaction->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ old('status', $transaction->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="paid" {{ old('status', $transaction->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="cancelled" {{ old('status', $transaction->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Payment Method</label>
                                <select name="payment_method" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="credit_card" {{ old('payment_method', $transaction->payment_method) == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                    <option value="debit_card" {{ old('payment_method', $transaction->payment_method) == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                                    <option value="bank_transfer" {{ old('payment_method', $transaction->payment_method) == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                    <option value="paypal" {{ old('payment_method', $transaction->payment_method) == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                </select>
                                @error('payment_method')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Payment Card</label>
                                <select name="payment_card" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="visa" {{ old('payment_card', $transaction->payment_card) == 'visa' ? 'selected' : '' }}>Visa</option>
                                    <option value="mastercard" {{ old('payment_card', $transaction->payment_card) == 'mastercard' ? 'selected' : '' }}>Mastercard</option>
                                    <option value="paypal" {{ old('payment_card', $transaction->payment_card) == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                    <option value="bank_transfer" {{ old('payment_card', $transaction->payment_card) == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                </select>
                                @error('payment_card')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Transaction Date</label>
                                <input type="date" name="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('transaction_date')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                            <textarea name="notes" rows="4"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('notes', $transaction->notes) }}</textarea>
                        </div>

                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('transactions.show', $transaction) }}" class="px-6 py-2 border border-gray-300 dark:border-gray-600
                                text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium
                                hover:bg-blue-600 transition">
                                Update Transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
