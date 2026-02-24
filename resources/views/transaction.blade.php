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
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Search transactions..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <select class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium hover:border-gray-400 dark:hover:border-gray-500 transition">
                        <option>Yearly</option>
                        <option>Monthly</option>
                        <option>Weekly</option>
                        <option>Daily</option>
                    </select>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Transactions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Transactions</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">2,485</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 15% from last month</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">$1.24M</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 22% from last month</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">2,156</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">86.8% completion rate</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">329</p>
                            <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-1">↑ 8 awaiting payment</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Transaction Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Jenny" alt="Jenny Wilson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jenny Wilson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F359</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">House</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Mastercard</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">03 Sep 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$219.78</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Esther" alt="Esther Howard" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Esther Howard</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F368</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Apartment</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Visa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">12 Sep 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$446.61</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Jane" alt="Jane Cooper" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jane Cooper</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F950</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 dark:bg-yellow-900/30 dark:text-yellow-400 rounded-full">Pending</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">House</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Mastercard</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">17 Sep 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$948.55</p>
                        </div>
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-yellow-600 dark:text-yellow-400">Pending</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Robert" alt="Robert Fox" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Robert Fox</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F859</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Villa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Paypal</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">09 Sep 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$202.87</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Kristin" alt="Kristin Watson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kristin Watson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F985</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">House</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Visa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">25 Oct 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$767.50</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 6 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Cody" alt="Cody Fisher" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Cody Fisher</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F998</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 dark:bg-red-900/30 dark:text-red-400 rounded-full">Cancelled</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Villa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Paypal</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">22 Oct 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$396.84</p>
                        </div>
                        <div class="bg-red-50 dark:bg-red-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-red-600 dark:text-red-400">Cancelled</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 7 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Bessie" alt="Bessie Cooper" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bessie Cooper</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F932</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Apartment</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Visa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">18 Oct 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$710.68</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 8 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Guy" alt="Guy Hawkins" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Guy Hawkins</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F950</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Villa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Paypal</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">09 Oct 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$854.08</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

                <!-- Transaction Card 9 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Theresa" alt="Theresa Webb" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Theresa Webb</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">#100F948</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Paid</span>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Property Type</span>
                            <span class="font-medium text-gray-900 dark:text-white">Villa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Payment Method</span>
                            <span class="font-medium text-gray-900 dark:text-white">Visa</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Purchase Date</span>
                            <span class="font-medium text-gray-900 dark:text-white">08 Oct 2025</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Amount</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$779.58</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">Paid</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View Details
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Invoice
                        </button>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="mt-8 flex items-center justify-between px-6 py-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">Showing 1 to 9 of 485 results</p>
                <div class="flex gap-2">
                    <button class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Previous
                    </button>
                    <button class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Next
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
