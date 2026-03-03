<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Customers</h1>
                    <p class="text-gray-500 text-sm mt-1">Manage and view all your customers</p>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Search (GET) -->
                    <form method="GET" action="{{ route('customers.index') }}" class="relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Search customers..."
                            class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400"
                        >
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </form>

                    <!-- Add Customer (wire to your create route later) -->
                    <a href="#"
                       class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:opacity-90 transition inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Customer
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Customers -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Customers</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                                {{ number_format($totalCustomers) }}
                            </p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">
                                @if(!is_null($growthPct))
                                    {{ $growthPct >= 0 ? '↑' : '↓' }} {{ abs($growthPct) }}% vs last month
                                @else
                                    No last-month data
                                @endif
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20H1v-2a6 6 0 016-6v0a6 6 0 016 6v0H9a4 4 0 00-4-4v0a4 4 0 00-4 4v2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Customers -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Active Customers</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                                {{ number_format($activeCustomers) }}
                            </p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">
                                {{ $totalCustomers > 0 ? round(($activeCustomers / $totalCustomers) * 100) : 0 }}% active rate
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Revenue</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                                ₱{{ number_format($totalRevenue, 2) }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                From paid/completed transactions
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 dark:from-amber-900 dark:to-amber-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- New Customers -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">New This Month</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                                {{ number_format($newThisMonth) }}
                            </p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">
                                Newly added customers
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($customers as $customer)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center font-bold text-gray-700 dark:text-gray-200">
                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $customer->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $customer->email }}</p>
                                </div>
                            </div>

                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $customer->status === 'active'
                                    ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300'
                                    : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300'
                                }}">
                                {{ ucfirst($customer->status) }}
                            </span>
                        </div>

                        <div class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            <div class="flex items-center justify-between">
                                <span>Phone</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ $customer->phone ?? '—' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Location</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ trim(($customer->city ?? '') . (isset($customer->state) ? ', '.$customer->state : ''), ' ,') ?: '—' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Total Spent</span>
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    ₱{{ number_format($customer->total_spent, 2) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Transactions</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ number_format($customer->total_transactions) }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <p class="text-xs text-gray-500">
                                Joined: {{ optional($customer->joined_at)->format('M d, Y') ?? '—' }}
                            </p>
                            <div class="flex gap-4">
                                <a href="{{ route('customers.show', $customer) }}"
                                   class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                                    View
                                </a>
                                <a href="{{ route('customers.edit', $customer) }}"
                                   class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:underline">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-10 text-center">
                        <p class="text-gray-700 dark:text-gray-200 font-semibold">No customers found</p>
                        <p class="text-gray-500 text-sm mt-1">Try a different search keyword.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $customers->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
