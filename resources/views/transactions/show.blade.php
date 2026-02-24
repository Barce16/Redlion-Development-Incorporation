<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction: ' . $transaction->invoice_id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Transaction Details</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Customer</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $transaction->customer->name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Amount</p>
                                    <p class="text-gray-900 dark:text-white font-semibold text-lg">₱{{ number_format($transaction->amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Payment Method</p>
                                    <p class="text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Payment Card</p>
                                    <p class="text-gray-900 dark:text-white">{{ ucfirst($transaction->payment_card) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Transaction Date</p>
                                    <p class="text-gray-900 dark:text-white">{{ $transaction->transaction_date->format('M d, Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Status</p>
                                    <span class="inline-block px-3 py-1 rounded text-sm font-semibold
                                        {{ $transaction->status == 'paid' ? 'bg-green-100 text-green-700 dark:bg-green-900' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900' }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($transaction->property)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Property</h3>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Title</p>
                                <p class="text-gray-900 dark:text-white font-semibold">{{ $transaction->property->title }}</p>
                            </div>
                        </div>
                        @endif

                        @if($transaction->notes)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Notes</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $transaction->notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('transactions.edit', $transaction) }}" class="block w-full px-4 py-2 bg-yellow-500 text-white rounded-lg
                                font-medium hover:bg-yellow-600 transition text-center text-sm">
                                Edit Transaction
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg font-medium
                                    hover:bg-red-600 transition text-sm" onclick="return confirm('Are you sure?')">
                                    Delete Transaction
                                </button>
                            </form>
                            <a href="{{ route('transaction') }}" class="block w-full px-4 py-2 bg-gray-500 text-white rounded-lg
                                font-medium hover:bg-gray-600 transition text-center text-sm">
                                Back to Transactions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
