<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Properties') }}
            </h2>
            <a href="{{ route('properties.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg
                font-medium hover:bg-blue-600 transition">
                Add New Property
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Total Properties</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Published</p>
                    <p class="text-2xl font-bold text-green-600">{{ $stats['published'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Draft</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $stats['draft'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Sold</p>
                    <p class="text-2xl font-bold text-red-600">{{ $stats['sold'] }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Type</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Price</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Location</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">Views</th>
                                <th class="px-6 py-3 text-right text-sm font-semibold text-gray-900 dark:text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse ($properties as $property)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-medium">
                                        {{ Str::limit($property->title, 30) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 rounded text-xs">
                                            {{ ucfirst($property->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-semibold">
                                        ₱{{ number_format($property->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $property->city }}, {{ $property->country }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-2 py-1 rounded text-xs font-medium
                                            {{ $property->status == 'published' ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200' : '' }}
                                            {{ $property->status == 'draft' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-200' : '' }}
                                            {{ $property->status == 'sold' ? 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-200' : '' }}
                                            {{ $property->status == 'archived' ? 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300' : '' }}
                                        ">
                                            {{ ucfirst($property->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $property->views }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right space-x-2">
                                        <a href="{{ route('properties.show', $property) }}" class="text-blue-500 hover:text-blue-700">
                                            View
                                        </a>
                                        <a href="{{ route('properties.edit', $property) }}" class="text-green-500 hover:text-green-700">
                                            Edit
                                        </a>
                                        <form action="{{ route('properties.destroy', $property) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-600 dark:text-gray-400">
                                        No properties found. <a href="{{ route('properties.create') }}" class="text-blue-500 hover:text-blue-700">Create one</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
