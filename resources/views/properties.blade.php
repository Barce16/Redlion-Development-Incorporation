@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="bg-gradient-to-r from-gray-900 to-gray-800 py-24 text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold">
            Explore Properties in Mindanao
        </h1>
        <p class="mt-6 text-gray-300 text-lg max-w-2xl mx-auto">
            Discover premium residential and commercial developments across Cagayan de Oro, Davao, General Santos, and more.
        </p>
    </div>
</section>

<!-- ================= FILTER SECTION ================= -->
<section class="bg-gray-950 py-10 border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6">

        <form method="GET" action="{{ route('properties.index') }}"
              class="grid md:grid-cols-4 gap-4">

            <!-- City -->
            <select name="city"
                class="px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-red-600">
                <option value="">Select City</option>
                <option value="Cagayan de Oro">Cagayan de Oro</option>
                <option value="Davao City">Davao City</option>
                <option value="General Santos">General Santos</option>
                <option value="Butuan City">Butuan City</option>
                <option value="Zamboanga City">Zamboanga City</option>
                <option value="Iligan City">Iligan City</option>
            </select>

            <!-- Property Type -->
            <select name="type"
                class="px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-red-600">
                <option value="">Property Type</option>
                <option value="House & Lot">House & Lot</option>
                <option value="Condominium">Condominium</option>
                <option value="Commercial">Commercial</option>
                <option value="Lot Only">Lot Only</option>
            </select>

            <!-- Price -->
            <select name="price"
                class="px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:ring-2 focus:ring-red-600">
                <option value="">Price Range</option>
                <option value="1-3">₱1M - ₱3M</option>
                <option value="3-5">₱3M - ₱5M</option>
                <option value="5-10">₱5M - ₱10M</option>
                <option value="10+">₱10M+</option>
            </select>

            <!-- Search Button -->
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 transition text-white font-semibold rounded-lg px-6 py-3">
                Search Properties
            </button>

        </form>

    </div>
</section>

<!-- ================= PROPERTY GRID ================= -->
<section class="bg-gray-950 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-8">

            @forelse($properties as $property)

            <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">

                <!-- Image -->
                <div class="relative">
                    <img src="{{ asset('storage/'.$property->image) }}"
                         class="h-64 w-full object-cover">

                    <!-- Status Badge -->
                    <span class="absolute top-4 left-4 px-4 py-1 text-xs font-semibold rounded-full
                        {{ $property->status == 'For Sale' ? 'bg-green-600' : 'bg-blue-600' }}">
                        {{ $property->status }}
                    </span>
                </div>

                <!-- Details -->
                <div class="p-6 text-white">

                    <h3 class="text-xl font-bold">
                        {{ $property->title }}
                    </h3>

                    <p class="text-gray-400 mt-2">
                        📍 {{ $property->city }}, {{ $property->province }}
                    </p>

                    <p class="text-gray-400 mt-2">
                        {{ $property->bedrooms }} Beds •
                        {{ $property->bathrooms }} Baths •
                        {{ $property->area }} sqm
                    </p>

                    <p class="mt-4 text-2xl font-bold text-red-500">
                        ₱ {{ number_format($property->price) }}
                    </p>

                    <a href="{{ route('properties.show', $property->id) }}"
                        class="mt-6 inline-block w-full text-center bg-white text-black font-semibold py-3 rounded-lg hover:scale-105 transition">
                        View Details
                    </a>

                </div>

            </div>

            @empty

            <div class="col-span-3 text-center text-gray-400">
                No properties found in Mindanao.
            </div>

            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $properties->links() }}
        </div>

    </div>
</section>

@endsection
