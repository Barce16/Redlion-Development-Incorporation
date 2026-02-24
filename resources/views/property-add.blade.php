<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
        <!-- Property Header Banner -->
        <div class="bg-gradient-to-r from-green-600 to-green-400 dark:from-green-700 dark:to-green-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex items-center justify-between">
                    <h1 class="text-4xl font-bold text-white">Add New Properties</h1>
                    <svg class="w-32 h-32 opacity-20" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Property Navigation Tabs -->
        <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-8 overflow-x-auto">
                    <!-- Basic Tab -->
                    <a href="#basic" class="py-4 px-2 border-b-2 border-green-500 text-green-600 dark:text-green-400 font-medium text-sm transition flex items-center gap-2 whitespace-nowrap">
                        <span class="flex items-center justify-center w-6 h-6 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-xs font-bold">1</span>
                        Basic
                    </a>

                    <!-- Gallery Tab -->
                    <a href="#gallery" class="py-4 px-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm transition flex items-center gap-2 whitespace-nowrap">
                        <span class="flex items-center justify-center w-6 h-6 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-bold">2</span>
                        Gallery
                    </a>

                    <!-- Video Tab -->
                    <a href="#video" class="py-4 px-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm transition flex items-center gap-2 whitespace-nowrap">
                        <span class="flex items-center justify-center w-6 h-6 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-bold">3</span>
                        Video
                    </a>

                    <!-- Feature Tab -->
                    <a href="#feature" class="py-4 px-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm transition flex items-center gap-2 whitespace-nowrap">
                        <span class="flex items-center justify-center w-6 h-6 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-bold">4</span>
                        Feature
                    </a>

                    <!-- Agent & Reviewer Tab -->
                    <a href="#agent" class="py-4 px-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 font-medium text-sm transition flex items-center gap-2 whitespace-nowrap">
                        <span class="flex items-center justify-center w-6 h-6 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-bold">5</span>
                        Agent & Reviewer
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Basic Information Tab Content -->
            <div id="basic" class="space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Left Column - Form -->
                    <div class="lg:col-span-2 space-y-8">

                        <!-- About Properties -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">About Properties</h3>

                            <div class="space-y-6">
                                <!-- Title -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                    <input type="text" placeholder="White dream house" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                </div>

                                <!-- Category -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                                    <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                        <option>Luxury</option>
                                        <option>Standard</option>
                                        <option>Budget</option>
                                    </select>
                                </div>

                                <!-- Basic Pricing -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Basic pricing</label>
                                        <input type="text" placeholder="$3453" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Stock</label>
                                        <input type="text" placeholder="250" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                </div>

                                <!-- Total Floor & Rooms -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total floor</label>
                                        <input type="text" placeholder="04" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Rooms</label>
                                        <input type="text" placeholder="06" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descriptions Property -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Descriptions property</h3>
                            <textarea placeholder="Enter descriptions....." class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500" rows="6"></textarea>
                        </div>

                        <!-- Location -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Location</h3>

                            <div class="space-y-6">
                                <!-- Country & City -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                            <option>USA</option>
                                            <option>Canada</option>
                                            <option>UK</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                            <option>New york</option>
                                            <option>Los Angeles</option>
                                            <option>Chicago</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Zone & Street -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Zone</label>
                                        <input type="text" placeholder="Zone" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Street address</label>
                                        <input type="text" placeholder="34 block 4" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                    </div>
                                </div>

                                <!-- Discount -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Discount</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                            <option>20%</option>
                                            <option>15%</option>
                                            <option>10%</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Discount type</label>
                                        <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                                            <option>New year</option>
                                            <option>Holiday</option>
                                            <option>Special</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-4">
                            <button class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Draft
                            </button>
                            <button class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-medium hover:opacity-90 transition">
                                Add Property
                            </button>
                        </div>
                    </div>

                    <!-- Right Column - Image Upload & Facilities -->
                    <div class="space-y-8">

                        <!-- Upload Image -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Upload image</h3>

                            <!-- Main Image -->
                            <div class="relative mb-4 rounded-lg overflow-hidden bg-gradient-to-br from-gray-200 to-gray-100 dark:from-gray-700 dark:to-gray-600 h-48 flex items-center justify-center group cursor-pointer">
                                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=500&h=400&fit=crop" alt="Property" class="w-full h-full object-cover">
                                <div class="absolute top-2 right-2 flex gap-2">
                                    <button class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 px-3 py-1 rounded text-xs font-medium hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Replace
                                    </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-xs font-medium hover:bg-red-600">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <!-- Thumbnail Images -->
                            <div class="grid grid-cols-3 gap-3">
                                <div class="aspect-square rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center cursor-pointer hover:opacity-75 transition">
                                    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=200&h=200&fit=crop" alt="Thumbnail" class="w-full h-full object-cover">
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center cursor-pointer hover:opacity-75 transition">
                                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=200&h=200&fit=crop" alt="Thumbnail" class="w-full h-full object-cover">
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center cursor-pointer hover:opacity-75 transition border-2 border-dashed border-gray-300 dark:border-gray-600">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Facilities -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Facilities</h3>
                                <button class="px-3 py-1 text-sm font-medium text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300">
                                    + Add category
                                </button>
                            </div>

                            <div class="space-y-4">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" checked class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Air conditions</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" checked class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">BBQ Area</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Wi-Fi</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" checked class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Swimming Pool</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Gym</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Garden</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Gym</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Parking</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Parking</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Parking</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Spa</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Sauna</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Lobby</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Laundry</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Playground</label>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-50 dark:bg-gray-700 rounded">
                                        <input type="checkbox" class="w-4 h-4 text-green-500 rounded">
                                        <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Playground</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</x-app-layout>
