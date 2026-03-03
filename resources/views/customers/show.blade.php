<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ 'Customer: ' . $customer->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Customer Information</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Email</p>
                                    <p class="text-gray-900 dark:text-white">{{ $customer->email }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Phone</p>
                                    <p class="text-gray-900 dark:text-white">{{ $customer->phone ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">City</p>
                                    <p class="text-gray-900 dark:text-white">{{ $customer->city ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">State</p>
                                    <p class="text-gray-900 dark:text-white">{{ $customer->state ?? 'N/A' }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Address</p>
                                    <p class="text-gray-900 dark:text-white">{{ $customer->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Transactions</h3>
                                <a href="{{ route('transactions.create', ['customer_id' => $customer->id]) }}"
                                   class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                                    Add Transaction
                                </a>
                            </div>
                            @if($transactions->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Invoice</th>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Property</th>
                                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Amount</th>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $transaction->invoice_id }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $transaction->transaction_date->format('M d, Y') }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                        @if($transaction->property)
                                                            <a href="{{ route('properties.show', $transaction->property) }}" class="hover:underline">
                                                                {{ $transaction->property->title }}
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-right text-gray-900 dark:text-white">₱{{ number_format($transaction->amount,2) }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-center">
                                                        <span class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $transaction->status == 'paid' ? 'bg-green-100 text-green-700 dark:bg-green-900' : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900' }}">
                                                            {{ ucfirst($transaction->status) }}
                                                        </span>
                                                    </td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 dark:text-blue-400 hover:underline">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $transactions->links() }}
                                </div>
                            @else
                                <p class="text-gray-600 dark:text-gray-400">No transactions yet.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Statistics</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Transactions</p>
                                    <p class="text-2xl font-bold text-blue-600">{{ $customer->total_transactions }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Spent</p>
                                    <p class="text-2xl font-bold text-green-600">₱{{ number_format($customer->total_spent, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Status</p>
                                    <span class="inline-block px-3 py-1 rounded text-sm font-semibold
                                        {{ $customer->status == 'active' ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200' }}">
                                        {{ ucfirst($customer->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actions</h3>
                            <div class="space-y-2">
                                <a href="{{ route('customers.edit', $customer) }}" class="block w-full px-4 py-2 bg-yellow-500 text-white rounded-lg
                                    font-medium hover:bg-yellow-600 transition text-center text-sm">
                                    Edit Customer
                                </a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg font-medium
                                        hover:bg-red-600 transition text-sm" onclick="return confirm('Are you sure?')">
                                        Delete Customer
                                    </button>
                                </form>
                                <a href="{{ route('customers.index') }}" class="block w-full px-4 py-2 bg-gray-500 text-white rounded-lg
                                    font-medium hover:bg-gray-600 transition text-center text-sm">
                                    Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
