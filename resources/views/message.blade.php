<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Messages</h1>
                    <p class="text-gray-500 text-sm mt-1">Manage and respond to all messages</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Search messages..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <select class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium hover:border-gray-400 dark:hover:border-gray-500 transition">
                        <option>All Messages</option>
                        <option>Unread</option>
                        <option>Read</option>
                        <option>Archived</option>
                    </select>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Messages -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Messages</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">1,842</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↓ 12% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Unread Messages -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Unread</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">24</p>
                            <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-1">Need your attention</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-100 to-yellow-50 dark:from-yellow-900 dark:to-yellow-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Avg Response Time -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Avg Response Time</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">2.3h</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↓ 18% improvement</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 dark:from-green-900 dark:to-green-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Satisfaction Rate -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Satisfaction Rate</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-2">96%</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">↑ 4% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 dark:from-purple-900 dark:to-purple-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Message Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-blue-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Marcus" alt="Marcus Johnson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marcus Johnson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">2 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 dark:bg-blue-900/30 dark:text-blue-400 rounded-full">Unread</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Inquiry about Property #2847</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">Hi, I'm interested in the luxury penthouse at downtown area. Can you provide more details about the amenities and availability? I'd also like to schedule a viewing if possible.</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

                <!-- Message Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah Williams" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sarah Williams</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Yesterday</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Answered</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Confirmed Viewing Appointment</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">Thank you for your prompt response. I've confirmed the viewing for tomorrow at 3 PM. Looking forward to seeing the property!</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

                <!-- Message Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-blue-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Michael" alt="Michael Chen" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Michael Chen</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">6 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 dark:bg-blue-900/30 dark:text-blue-400 rounded-full">Unread</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Question about Payment Terms</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">I'm ready to make an offer on the property. Could you clarify the payment options and financing assistance available?</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

                <!-- Message Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Jessica" alt="Jessica Lee" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jessica Lee</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">3 days ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Answered</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Purchase Agreement Signature</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">I've received the purchase agreement. Just going through it with my lawyer. Will send back signed copies by Friday.</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

                <!-- Message Card 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-blue-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=David" alt="David Rodriguez" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">David Rodriguez</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">4 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 dark:bg-blue-900/30 dark:text-blue-400 rounded-full">Unread</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Rental Property Inquiry</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">Interested in renting for investment purposes. Can you provide rental rates, tenant history, and maintenance costs for the property?</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

                <!-- Message Card 6 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 hover:shadow-lg transition border-l-4 border-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Emily" alt="Emily Thompson" class="w-14 h-14 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Emily Thompson</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">1 day ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/30 dark:text-green-400 rounded-full">Answered</span>
                    </div>

                    <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Move-in Schedule Confirmed</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">Perfect! Move-in date is set for March 15th. I'll have the keys ready and documentation completed before then.</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            View
                        </button>
                        <button class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Reply
                        </button>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="mt-8 flex items-center justify-between px-6 py-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">Showing 1 to 6 of 1,842 messages</p>
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
