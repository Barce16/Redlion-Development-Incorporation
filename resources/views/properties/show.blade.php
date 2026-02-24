<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $property->title }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('properties.edit', $property) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg
                    font-medium hover:bg-yellow-600 transition inline-block">
                    Edit
                </a>
                <form action="{{ route('properties.destroy', $property) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg font-medium
                        hover:bg-red-600 transition" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
                <a href="{{ route('properties.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg
                    font-medium hover:bg-gray-600 transition inline-block">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Basic Info -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Property Details</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Type</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ ucfirst($property->type) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Category</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ ucfirst($property->category) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Price</p>
                                    <p class="text-gray-900 dark:text-white font-semibold text-lg">₱{{ number_format($property->price, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Stock</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $property->stock }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Floors</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $property->total_floors ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Rooms</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $property->total_rooms ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Area (sqft)</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $property->area ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Status</p>
                                    <span class="px-2 py-1 rounded text-xs font-medium
                                        {{ $property->status == 'published' ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200' : '' }}
                                        {{ $property->status == 'draft' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-200' : '' }}
                                        {{ $property->status == 'sold' ? 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200' : '' }}
                                        {{ $property->status == 'archived' ? 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300' : '' }}
                                    ">
                                        {{ ucfirst($property->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($property->description)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Description</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $property->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Location -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Location</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Country</p>
                                    <p class="text-gray-900 dark:text-white">{{ $property->country ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">City</p>
                                    <p class="text-gray-900 dark:text-white">{{ $property->city ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Zone</p>
                                    <p class="text-gray-900 dark:text-white">{{ $property->zone ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Street Address</p>
                                    <p class="text-gray-900 dark:text-white">{{ $property->street_address ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Stats -->
                <div class="space-y-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Statistics</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Views</p>
                                    <p class="text-2xl font-bold text-blue-600">{{ $property->views }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Inquiries</p>
                                    <p class="text-2xl font-bold text-yellow-600">{{ $property->inquiries }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Sales</p>
                                    <p class="text-2xl font-bold text-green-600">{{ $property->sales }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actions</h3>
                            <div class="space-y-2">
                                <form action="{{ route('properties.increment-views', $property) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg
                                        font-medium hover:bg-blue-600 transition text-sm">
                                        Increment Views
                                    </button>
                                </form>
                                <form action="{{ route('properties.increment-inquiries', $property) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 bg-yellow-500 text-white rounded-lg
                                        font-medium hover:bg-yellow-600 transition text-sm">
                                        Increment Inquiries
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-sm text-gray-600 dark:text-gray-400">
                            <p><strong>Created:</strong> {{ $property->created_at->format('M d, Y H:i') }}</p>
                            <p><strong>Updated:</strong> {{ $property->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
