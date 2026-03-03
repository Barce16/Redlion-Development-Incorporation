<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Transactions</h1>
                    <p class="text-gray-500 text-sm mt-1">Track and manage all property transactions</p>
                </div>
                <div>
                    <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        New Transaction
                    </a>
                </div>
                <div class="flex items-center gap-3">
                    <form action="{{ route('transactions.index') }}" method="GET" class="flex items-center gap-2">
                        <div class="relative">
                            <input name="search" value="{{ $search ?? '' }}" type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <select name="status" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none">
                            <option value="">All Status</option>
                            <option value="pending" {{ (isset($status) && $status=='pending')?'selected':'' }}>Pending</option>
                            <option value="completed" {{ (isset($status) && $status=='completed')?'selected':'' }}>Completed</option>
                            <option value="paid" {{ (isset($status) && $status=='paid')?'selected':'' }}>Paid</option>
                            <option value="cancelled" {{ (isset($status) && $status=='cancelled')?'selected':'' }}>Cancelled</option>
                            <option value="failed" {{ (isset($status) && $status=='failed')?'selected':'' }}>Failed</option>
                            <option value="refunded" {{ (isset($status) && $status=='refunded')?'selected':'' }}>Refunded</option>
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Go</button>
                    </form>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Transactions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Transactions</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($totalTransactions) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Revenue</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">₱{{ number_format($totalRevenue,2) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Completed Transactions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Completed</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($completedTransactions) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 dark:from-amber-900 dark:to-amber-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending Transactions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Pending</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ number_format($pendingTransactions) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Transaction Listing -->
            @if($transactions->count())
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Customer</th>
                                <th class="px-4 py-2">Property</th>
                                <th class="px-4 py-2">Amount</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Type</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $txn)
                                <tr class="border-t border-gray-200 dark:border-gray-700">
                                    <td class="px-4 py-2 text-sm">{{ $txn->transaction_date->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $txn->customer->name }}</td>
                                    <td class="px-4 py-2 text-sm">{{ Str::limit($txn->property->title ?? '-', 30) }}</td>
                                    <td class="px-4 py-2 text-sm">₱{{ number_format($txn->amount,2) }}</td>
                                    <td class="px-4 py-2 text-sm capitalize">{{ $txn->status }}</td>
                                    <td class="px-4 py-2 text-sm capitalize">{{ $txn->payment_type }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('transactions.show', $txn) }}" class="text-blue-600 dark:text-blue-400 hover:underline">View</a>
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
                <p class="text-gray-600 dark:text-gray-400">No transactions found.</p>
            @endif


        </div>
    </div>
</x-app-layout>
