{{-- Modern Dashboard View --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
    <!-- Page Header -->
    <div class="px-6 py-8 border-b border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                    <p class="text-gray-400 mt-1">Welcome back, {{ Auth::user()->name }}!</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="px-4 py-2 bg-white/10 border border-white/20 rounded-lg hover:bg-white/20 transition text-white text-sm font-medium">
                        📊 Export Report
                    </button>
                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg font-medium text-white">
                        + New Property
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Card 1: Total Properties Value -->
            <div class="bg-white/5 backdrop-blur border border-white/10 rounded-lg p-6 hover:border-red-600/50 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Properties Value</p>
                        <p class="text-2xl font-bold text-white mt-2">${{ number_format($totalValue / 1000000, 1) }}M</p>
                        <p class="text-green-400 text-xs mt-2">↑ 12% from last month</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center text-2xl">
                        🏢
                    </div>
                </div>
            </div>

            <!-- Card 2: Active Sales -->
            <div class="bg-white/5 backdrop-blur border border-white/10 rounded-lg p-6 hover:border-blue-600/50 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Completed Sales</p>
                        <p class="text-2xl font-bold text-white mt-2">{{ $totalSales }}</p>
                        <p class="text-green-400 text-xs mt-2">↑ 8 this month</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center text-2xl">
                        📈
                    </div>
                </div>
            </div>

            <!-- Card 3: Total Customers -->
            <div class="bg-white/5 backdrop-blur border border-white/10 rounded-lg p-6 hover:border-green-600/50 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Active Customers</p>
                        <p class="text-2xl font-bold text-white mt-2">{{ $totalCustomers }}</p>
                        <p class="text-green-400 text-xs mt-2">↑ 24 new this month</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center text-2xl">
                        👥
                    </div>
                </div>
            </div>

            <!-- Card 4: Pending Properties -->
            <div class="bg-white/5 backdrop-blur border border-white/10 rounded-lg p-6 hover:border-yellow-600/50 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Properties Inquiries</p>
                        <p class="text-2xl font-bold text-white mt-2">42</p>
                        <p class="text-yellow-400 text-xs mt-2">⚠ 15 requires attention</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-600 to-yellow-700 flex items-center justify-center text-2xl">
                        💬
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts & Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Transactions (Wide) -->
            <div class="lg:col-span-2 bg-white/5 backdrop-blur border border-white/10 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-white/10">
                    <h2 class="text-lg font-semibold text-white">Recent Transactions</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400">Property</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTransactions as $transaction)
                                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                                    <td class="px-6 py-3 text-sm text-white">{{ $transaction->customer->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-400">{{ $transaction->property->title ?? 'N/A' }}</td>
                                    <td class="px-6 py-3 text-sm font-semibold text-white">${{ number_format($transaction->amount, 0) }}</td>
                                    <td class="px-6 py-3">
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
                                            @if($transaction->status === 'paid') bg-green-500/20 text-green-400
                                            @elseif($transaction->status === 'pending') bg-yellow-500/20 text-yellow-400
                                            @else bg-red-500/20 text-red-400
                                            @endif">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 text-sm text-gray-400">{{ $transaction->created_at->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">No transactions yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Properties (Sidebar) -->
            <div class="bg-white/5 backdrop-blur border border-white/10 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-white/10">
                    <h2 class="text-lg font-semibold text-white">Top Properties</h2>
                </div>
                <div class="divide-y divide-white/10">
                    @forelse($topProperties as $property)
                        <div class="p-4 hover:bg-white/5 transition cursor-pointer">
                            <p class="font-medium text-white text-sm">{{ $property->title }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-400">👀 {{ $property->views }} views</span>
                                <span class="text-xs bg-red-500/20 text-red-400 px-2 py-1 rounded">{{ $property->status }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 text-center text-gray-400 text-sm">No properties available</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Reminders Section -->
        @if($reminders->count() > 0)
            <div class="mt-6 bg-gradient-to-r from-yellow-600/20 to-red-600/20 border border-yellow-600/50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">⚠ Pending Actions</h3>
                <div class="space-y-2">
                    @foreach($reminders as $reminder)
                        <div class="flex items-center justify-between p-3 bg-white/5 rounded">
                            <span class="text-sm text-gray-300">{{ $reminder->customer->name }} - {{ $reminder->property->title }}</span>
                            <button class="text-xs px-3 py-1 bg-yellow-600 hover:bg-yellow-700 rounded text-white">Review</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
