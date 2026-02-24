<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('properties.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Title
                                </label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Property title">
                                @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Type
                                </label>
                                <select id="type" name="type" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Type</option>
                                    <option value="house" {{ old('type') == 'house' ? 'selected' : '' }}>House</option>
                                    <option value="apartment" {{ old('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                    <option value="villa" {{ old('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="commercial" {{ old('type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    <option value="land" {{ old('type') == 'land' ? 'selected' : '' }}>Land</option>
                                </select>
                                @error('type')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Category
                                </label>
                                <select id="category" name="category" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Category</option>
                                    <option value="residential" {{ old('category') == 'residential' ? 'selected' : '' }}>Residential</option>
                                    <option value="commercial" {{ old('category') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                    <option value="industrial" {{ old('category') == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Price
                                </label>
                                <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="0.00">
                                @error('price')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Property description">{{ old('description') }}</textarea>
                            @error('description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Stock -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Stock
                                </label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', 1) }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('stock')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Total Floors -->
                            <div>
                                <label for="total_floors" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Total Floors
                                </label>
                                <input type="number" id="total_floors" name="total_floors" value="{{ old('total_floors') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('total_floors')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Total Rooms -->
                            <div>
                                <label for="total_rooms" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Total Rooms
                                </label>
                                <input type="number" id="total_rooms" name="total_rooms" value="{{ old('total_rooms') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('total_rooms')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Area -->
                            <div>
                                <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Area (sqft)
                                </label>
                                <input type="number" id="area" name="area" value="{{ old('area') }}" step="0.01"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('area')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Country -->
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Country
                                </label>
                                <input type="text" id="country" name="country" value="{{ old('country') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('country')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    City
                                </label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Zone -->
                            <div>
                                <label for="zone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Zone
                                </label>
                                <input type="text" id="zone" name="zone" value="{{ old('zone') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('zone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Street Address -->
                            <div>
                                <label for="street_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Street Address
                                </label>
                                <input type="text" id="street_address" name="street_address" value="{{ old('street_address') }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('street_address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status
                            </label>
                            <select id="status" name="status" class="block w-full px-4 py-2 border border-gray-300
                                dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('properties.index') }}" class="px-6 py-2 border border-gray-300 dark:border-gray-600
                                text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium
                                hover:bg-blue-600 transition">
                                Create Property
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
