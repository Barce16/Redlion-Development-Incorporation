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
                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Basic Information -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Basic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Project Name -->
                                <div>
                                    <label for="project_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Project Name
                                    </label>
                                    <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="e.g., Sunrise Residences">
                                    @error('project_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Developer Company -->
                                <div>
                                    <label for="developer_company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Developer Company
                                    </label>
                                    <input type="text" id="developer_company" name="developer_company" value="{{ old('developer_company') }}"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="e.g., Redlion Development Inc.">
                                    @error('developer_company')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                                <!-- Province -->
                                <div>
                                    <label for="province" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Province
                                    </label>
                                    <input type="text" id="province" name="province" value="{{ old('province') }}"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('province')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Completion Status -->
                                <div>
                                    <label for="completion_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Completion Status (% done)
                                    </label>
                                    <input type="number" id="completion_percentage" name="completion_percentage" value="{{ old('completion_percentage', 0) }}" min="0" max="100"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="0">
                                    @error('completion_percentage')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

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

                           

                            <!-- Category (Project Type) -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Project Type
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

                        <!-- Financial Details -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Financial Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                               
                                <!-- Per Sqm Price -->
                                <div>
                                    <label for="price_per_sqm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Per Sqm Price
                                    </label>
                                    <input type="number" id="price_per_sqm" name="price_per_sqm" value="{{ old('price_per_sqm') }}" step="0.01"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="0.00">
                                    @error('price_per_sqm')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Reservation Fee -->
                                <div>
                                    <label for="reservation_fee" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Reservation Fee
                                    </label>
                                    <input type="number" id="reservation_fee" name="reservation_fee" value="{{ old('reservation_fee') }}" step="0.01"
                                           class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                           dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="0.00">
                                    @error('reservation_fee')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Payment Terms -->
                                <div>
                                    <label for="payment_terms" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Payment Terms
                                    </label>
                                    <select id="payment_terms" name="payment_terms"
                                            class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                            dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Select Terms</option>
                                        <option value="Installment" {{ old('payment_terms') == 'Installment' ? 'selected' : '' }}>Installment</option>
                                        <option value="Bank Financing" {{ old('payment_terms') == 'Bank Financing' ? 'selected' : '' }}>Bank Financing</option>
                                    </select>
                                    @error('payment_terms')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        

                        

                        <!-- Plans & Design -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Plans & Design</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Architectural Floor Plan (PDF) -->
                                <div>
                                    <label for="floor_plan_pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Architectural Floor Plan (PDF upload)
                                    </label>
                                    <input type="file" id="floor_plan_pdf" name="floor_plan_pdf" accept="application/pdf"
                                           class="block w-full text-sm text-gray-700 dark:text-gray-300">
                                    @error('floor_plan_pdf')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Site Development Plan (PDF) -->
                                <div>
                                    <label for="site_plan_pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Site Development Plan (PDF upload)
                                    </label>
                                    <input type="file" id="site_plan_pdf" name="site_plan_pdf" accept="application/pdf"
                                           class="block w-full text-sm text-gray-700 dark:text-gray-300">
                                    @error('site_plan_pdf')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- 3D Perspective Render / Image Gallery -->
                                <div class="md:col-span-2">
                                    <label for="project_images" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Image Gallery (renders, elevation, interior)
                                    </label>
                                    <input type="file" id="project_images" name="project_images[]" multiple accept="image/*"
                                           class="block w-full text-sm text-gray-700 dark:text-gray-300">
                                    @error('project_images.*')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <!-- Downloadable brochure -->
                                <div>
                                    <label for="brochure_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Downloadable Brochure (PDF/DOC)
                                    </label>
                                    <input type="file" id="brochure_file" name="brochure_file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                           class="block w-full text-sm text-gray-700 dark:text-gray-300">
                                    @error('brochure_file')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                </div>
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
