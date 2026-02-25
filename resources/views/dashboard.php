<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h1>
                    <p class="text-gray-500 text-sm mt-1">Welcome back! Here's your property portfolio summary</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        Export
                    </button>
                    <button class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-lg hover:opacity-90">
                        + Add Property
                    </button>
                </div>
            </div>

            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Properties Managed -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Properties Managed</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">0</p>
                            <div class="flex items-center mt-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-sm text-green-600 dark:text-green-400 ml-1">12% Last year</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4l4-2m-8 3h8"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Asset Value -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Asset Value</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">₱0</p>
                            <div class="flex items-center mt-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-sm text-green-600 dark:text-green-400 ml-1">7.2% Last year</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Properties Sold -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Properties Sold</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">0</p>
                            <div class="flex items-center mt-2">
                                <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-sm text-amber-600 dark:text-amber-400 ml-1">23.5% Last year</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 dark:from-amber-900 dark:to-amber-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- New Clients -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">New Clients</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">0</p>
                            <div class="flex items-center mt-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="text-sm text-purple-600 dark:text-purple-400 ml-1">5.9% Last year</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a6 6 0 11-12 0 6 6 0 0112 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

                <!-- Status Analysis Pie Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status Analysis</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div class="flex justify-center mb-6">
                        <svg width="150" height="150" viewBox="0 0 150 150" class="transform -rotate-90">
                            <!-- Pie chart segments -->
                            <circle cx="75" cy="75" r="60" fill="none" stroke="#3b82f6" stroke-width="30" stroke-dasharray="188.4 565.2" />
                            <circle cx="75" cy="75" r="60" fill="none" stroke="#f59e0b" stroke-width="30" stroke-dasharray="141.3 565.2" transform="rotate(120 75 75)" />
                            <circle cx="75" cy="75" r="60" fill="none" stroke="#f97316" stroke-width="30" stroke-dasharray="94.2 565.2" transform="rotate(195 75 75)" />
                            <circle cx="75" cy="75" r="60" fill="none" stroke="#10b981" stroke-width="30" stroke-dasharray="141.3 565.2" transform="rotate(255 75 75)" />
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Inquire</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-amber-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Customer</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-orange-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Transactions</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-emerald-500 mr-2"></div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Others</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">0</span>
                        </div>
                    </div>
                </div>

                <!-- Revenue Generation Chart -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Generation</h3>
                        <div class="flex items-center gap-2">
                            <select class="text-sm px-3 py-1 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option>Deals</option>
                                <option>Bookings</option>
                            </select>
                            <span class="text-xs text-gray-500">Last year</span>
                        </div>
                    </div>
                    <div class="flex items-end justify-between h-64 gap-2">
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 40%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 50%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 60%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 70%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 80%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 75%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 85%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 65%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 90%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 70%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 60%;"></div></div>
                        <div class="flex-1"><div class="bg-green-400 rounded-t" style="height: 50%;"></div></div>
                    </div>
                    <div class="flex justify-between mt-4 text-xs text-gray-500">
                        <span>Jan</span>
                        <span>Feb</span>
                        <span>Mar</span>
                        <span>Apr</span>
                        <span>May</span>
                        <span>Jun</span>
                        <span>Jul</span>
                        <span>Aug</span>
                        <span>Sep</span>
                        <span>Oct</span>
                        <span>Nov</span>
                        <span>Dec</span>
                    </div>
                </div>

            </div>

            <!-- Explore Your Properties -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Explore Your Properties</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                            </svg>
                            Your top performing properties
                        </p>
                    </div>
                    <button class="text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium">View All</button>
                </div>

                <!-- Properties Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Property Card 1 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative h-48 bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white">Sunset Retreat Villa</h4>
                            <p class="text-sm text-gray-500 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                Austin, Texas
                            </p>
                            <div class="flex justify-between items-end mt-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₱0</p>
                                    <p class="text-xs text-gray-500">per month</p>
                                </div>
                                <div class="text-right text-xs text-gray-600 dark:text-gray-400">
                                    <p>🏠 3 bed</p>
                                    <p>🚿 2 bath</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 2 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative h-48 bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white">Riverside Haven</h4>
                            <p class="text-sm text-gray-500 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                Portland, Oregon
                            </p>
                            <div class="flex justify-between items-end mt-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₱0</p>
                                    <p class="text-xs text-gray-500">per month</p>
                                </div>
                                <div class="text-right text-xs text-gray-600 dark:text-gray-400">
                                    <p>🏠 4 bed</p>
                                    <p>🚿 3 bath</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 3 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative h-48 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white">Mountain View Villa</h4>
                            <p class="text-sm text-gray-500 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                Boulder, Colorado
                            </p>
                            <div class="flex justify-between items-end mt-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₱0</p>
                                    <p class="text-xs text-gray-500">per month</p>
                                </div>
                                <div class="text-right text-xs text-gray-600 dark:text-gray-400">
                                    <p>🏠 2 bed</p>
                                    <p>🚿 2 bath</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Card 4 -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative h-48 bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 dark:text-white">Ocean Breeze Cottage</h4>
                            <p class="text-sm text-gray-500 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                San Diego, California
                            </p>
                            <div class="flex justify-between items-end mt-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">₱0</p>
                                    <p class="text-xs text-gray-500">per month</p>
                                </div>
                                <div class="text-right text-xs text-gray-600 dark:text-gray-400">
                                    <p>🏠 3 bed</p>
                                    <p>🚿 1 bath</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Reminders and Calendar Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Reminders Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reminders</h3>
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-700 text-sm font-medium">+ Add</button>
                    </div>
                    <div class="space-y-4">
                        <!-- Reminder 1 -->
                        <div class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                            <div class="w-2 h-2 rounded-full bg-blue-500 mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Follow up with client</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Today at 2:00 PM</p>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 text-lg">×</button>
                        </div>

                        <!-- Reminder 2 -->
                        <div class="flex items-start gap-4 p-4 bg-amber-50 dark:bg-amber-900/20 rounded-lg border border-amber-200 dark:border-amber-800">
                            <div class="w-2 h-2 rounded-full bg-amber-500 mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Property inspection scheduled</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Tomorrow at 10:00 AM</p>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 text-lg">×</button>
                        </div>

                        <!-- Reminder 3 -->
                        <div class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                            <div class="w-2 h-2 rounded-full bg-green-500 mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Review contract documents</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Friday at 3:00 PM</p>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 text-lg">×</button>
                        </div>

                        <!-- Reminder 4 -->
                        <div class="flex items-start gap-4 p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg border border-purple-200 dark:border-purple-800">
                            <div class="w-2 h-2 rounded-full bg-purple-500 mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">Team meeting</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Next Monday at 9:00 AM</p>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 text-lg">×</button>
                        </div>
                    </div>
                </div>

                <!-- Calendar Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">June 2025</h3>
                            <div class="flex gap-2">
                                <button class="p-1 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <button class="p-1 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Weekday Headers -->
                        <div class="grid grid-cols-7 gap-2 mb-2">
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Sun</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Mon</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Tue</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Wed</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Thu</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Fri</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Sat</div>
                        </div>

                        <!-- Calendar Days -->
                        <div class="grid grid-cols-7 gap-2">
                            <!-- Empty cells for days before month starts -->
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>

                            <!-- June 1 - 30 -->
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">1</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">2</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">3</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">4</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">5</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">6</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">7</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">8</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">9</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">10</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">11</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">12</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">13</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">14</div>
                            <div class="text-center py-2 text-sm bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 font-semibold rounded py-2 text-sm">15</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">16</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">17</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">18</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">19</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">20</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">21</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">22</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">23</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">24</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">25</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">26</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">27</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">28</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">29</div>
                            <div class="text-center py-2 text-sm text-gray-600 dark:text-gray-400">30</div>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Upcoming Events</h4>
                        <div class="space-y-2">
                            <div class="text-xs p-2 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded">
                                <p class="font-medium text-blue-900 dark:text-blue-300">Property Viewing</p>
                                <p class="text-blue-700 dark:text-blue-400">Jun 18 · 10:00 AM</p>
                            </div>
                            <div class="text-xs p-2 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded">
                                <p class="font-medium text-green-900 dark:text-green-300">Client Meeting</p>
                                <p class="text-green-700 dark:text-green-400">Jun 22 · 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
