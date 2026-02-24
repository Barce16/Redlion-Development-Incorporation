<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reports</h1>
                    <p class="text-gray-500 text-sm mt-1">View analytics and performance metrics</p>
                </div>
                <div class="flex items-center gap-3">
                    <select class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium hover:border-gray-400 dark:hover:border-gray-500 transition">
                        <option>Last 30 Days</option>
                        <option>Last 60 Days</option>
                        <option>Last 90 Days</option>
                        <option>Last Year</option>
                    </select>
                    <button class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:opacity-90 transition inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Export
                    </button>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Revenue -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Revenue</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">$2.45M</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 28% from last period</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Sales</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">486</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 15% from last period</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8L5.257 19.393A2 2 0 005 18.659V5a2 2 0 012-2h10a2 2 0 012 2v10.237"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Avg Transaction Value -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Avg Transaction Value</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">$5,042</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 9% from last period</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 dark:from-amber-900 dark:to-amber-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Conversion Rate -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Conversion Rate</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">3.8%</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 0.5% from last period</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Revenue Trend Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Revenue Trend</h3>
                    <div class="h-64 flex items-end justify-around gap-2">
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t" style="height: 30%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 1</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t" style="height: 45%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 2</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t" style="height: 55%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 3</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t" style="height: 70%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 4</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t" style="height: 85%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 5</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-gradient-to-t from-green-500 to-green-400 rounded-t" style="height: 100%;"></div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Week 6</p>
                        </div>
                    </div>
                </div>

                <!-- Sales by Property Type -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Sales by Property Type</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Houses</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Apartments</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">30%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full" style="width: 30%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Villas</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">15%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-amber-500 to-amber-600 h-2 rounded-full" style="width: 15%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Commercial</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">10%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2 rounded-full" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Performing Properties -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Top Performing Properties</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Property Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Type</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Views</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Inquiries</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Sales</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Revenue</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Downtown Luxury Penthouse</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Apartment</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">1,248</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">89</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">12</td>
                                <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">$2.4M</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Suburban Family Estate</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">House</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">892</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">67</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">8</td>
                                <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">$1.8M</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Beachfront Villa Resort</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Villa</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">756</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">54</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">6</td>
                                <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">$1.2M</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Business District Office</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Commercial</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">634</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">42</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">3</td>
                                <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">$850K</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Modern City Apartment</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Apartment</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">521</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">38</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">2</td>
                                <td class="px-6 py-4 text-sm font-semibold text-green-600 dark:text-green-400">$650K</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
