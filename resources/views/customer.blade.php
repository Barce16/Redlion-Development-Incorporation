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
                    <div class="relative">
                        <input type="text" placeholder="Search customers..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:opacity-90 transition inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Customer
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Customers -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Customers</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">1,240</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 12% from last month</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">956</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">77% active rate</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">$542.8K</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 18% from last month</p>
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
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">89</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 7% growth</p>
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

                <!-- Customer Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Jenny" alt="Jenny Wilson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jenny Wilson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            jenny.wilson@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 123-4567
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Austin, Texas
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">12</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$4.2K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

                <!-- Customer Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Esther" alt="Esther Howard" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Esther Howard</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            esther.howard@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 234-5678
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Portland, Oregon
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">8</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$3.8K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

                <!-- Customer Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Robert" alt="Robert Fox" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Robert Fox</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            robert.fox@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 345-6789
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Denver, Colorado
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">5</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$2.1K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

                <!-- Customer Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Kristin" alt="Kristin Watson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kristin Watson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            kristin.watson@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 456-7890
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Seattle, Washington
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">15</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$5.6K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

                <!-- Customer Card 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Jane" alt="Jane Cooper" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jane Cooper</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            jane.cooper@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 567-8901
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Miami, Florida
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">19</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$7.3K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

                <!-- Customer Card 6 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Theresa" alt="Theresa Webb" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Theresa Webb</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Buyer</p>
                            </div>
                        </div>
                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            theresa.webb@email.com
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.324a1 1 0 00.502.731c.618.2 1.288-.004 1.959-.822l5.75-6.759a2 2 0 012.670.856l2.921 5.834a2 2 0 01-.843 2.812l-8.38 5.587a2 2 0 01-2.717-.318l-.888-1.388"/>
                            </svg>
                            +1 (555) 678-9012
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            Las Vegas, Nevada
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Transactions</p>
                            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">2</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Spent</p>
                            <p class="text-xl font-bold text-green-600 dark:text-green-400">$1.2K</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Message
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
