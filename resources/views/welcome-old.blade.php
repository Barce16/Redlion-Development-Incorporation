<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Redlion Development Incorporation</title>

<!-- Tailwind CDN -->
<script>
  tailwind.config = {
    darkMode: 'class'
  }
</script>
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
body {
  font-family: 'Inter', sans-serif;
}
.hero-bg {
  background-image: url('images/hotel.png'); /* Replace with your image */
  background-size: cover;
  background-position: center;
}
</style>
</head>

<body class="bg-white text-gray-900 dark:bg-gray-950 dark:text-white transition-colors duration-500">

<!-- ================= PREMIUM TAILWIND NAVBAR ================= -->
<header id="navbar"
class="fixed top-0 left-0 w-full z-50 transition-all duration-500 bg-black/40 backdrop-blur-md">

    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

        <!-- Logo -->
        <a href="/" class="flex items-center gap-3 group">
            <img src="images/logo.jpg" class="h-11 w-auto object-contain transition duration-500 group-hover:scale-105">

            <div class="leading-tight">
                <h1 class="text-lg md:text-xl font-bold tracking-wider text-white">
                    REDLION
                </h1>
                <span class="text-xs text-gray-400 tracking-[0.25em]">
                    DEVELOPMENT INC.
                </span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">

            <!-- Nav Links -->
            <a href="/" class="relative text-gray-300 hover:text-white transition group">
                Home
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ route('properties.index') }}" class="relative text-gray-300 hover:text-white transition group">
                Properties
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="{{ route('premium-developments') }}" class="relative text-yellow-400 hover:text-yellow-300 transition group font-semibold">
                Premium Developments
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-yellow-500 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="#" class="relative text-gray-300 hover:text-white transition group">
                About
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <a href="#" class="relative text-gray-300 hover:text-white transition group">
                Contact
                <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-600"></div>

             <!-- Login Up Button -->
            <a href="auth/login"
            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700
            rounded-full text-white font-semibold shadow-lg
            hover:shadow-red-600/40 hover:scale-105 transition-all duration-300">
                Login
            </a>

            <!-- Sign Up Button
            <a href="auth/register"
            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700
            rounded-full text-white font-semibold shadow-lg
            hover:shadow-red-600/40 hover:scale-105 transition-all duration-300">
                Sign Up
            </a>    -->

        </nav>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
    class="hidden md:hidden bg-black/95 backdrop-blur-lg border-t border-gray-800">

        <div class="flex flex-col space-y-6 px-6 py-8 text-gray-300 text-base">

            <a href="/welcome" class="hover:text-white transition">Home</a>
            <a href="/properties" class="hover:text-white transition">Properties</a>
            <a href="#" class="hover:text-white transition">About</a>
            <a href="#" class="hover:text-white transition">Contact</a>

            <div class="border-t border-gray-700 pt-6 space-y-4">
                <a href="auth/login" class="block hover:text-white">Login</a>

                <a href="auth/register"
                class="block text-center py-3 bg-red-600 rounded-full text-white font-semibold">
                    Sign Up
                </a>
            </div>

        </div>
    </div>

</header>

<!-- ================= HERO SLIDER ================= -->
<section class="relative h-screen overflow-hidden text-white">

<!-- Slides -->
<div id="slider" class="relative w-full h-full overflow-hidden">

  <!-- Slide 1 -->
  <div class="slide absolute inset-0 opacity-100 transition-opacity duration-1000">
    <img src="images/hotel2.jpg"
         class="w-full h-full object-contain md:object-cover object-center">
  </div>

  <!-- Slide 2 -->
  <div class="slide absolute inset-0 opacity-0 transition-opacity duration-1000">
    <img src="images/hotel3.jpg"
         class="w-full h-full object-contain md:object-cover object-center">
  </div>

  <!-- Slide 3 -->
  <div class="slide absolute inset-0 opacity-0 transition-opacity duration-1000">
    <img src="images/hotel.png"
         class="w-full h-full object-contain md:object-cover object-center">
  </div>

  <!-- Dark Overlay -->
  <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-black/60 to-black/30"></div>

</div>

  <!-- Content -->
  <div class="absolute inset-0 flex items-center">
    <div class="max-w-7xl mx-auto px-6">

      <span class="bg-red-600/90 text-xs px-4 py-2 rounded-full uppercase tracking-wider">
        Premium Development
      </span>

      <h1 class="mt-6 text-5xl md:text-7xl font-extrabold max-w-3xl leading-tight animate-fade">
        Building Strong Foundations for Tomorrow
      </h1>

      <p class="mt-6 text-gray-300 text-lg max-w-xl">
        Luxury residential & commercial developments across prime global locations.
      </p>

      <!-- Search Bar -->
      <div class="mt-10 bg-black/30 backdrop-blur-lg p-4 rounded-2xl flex flex-col md:flex-row gap-4 max-w-3xl">
        <input type="text" placeholder="Search Location"
          class="flex-1 px-4 py-3 bg-transparent border border-white/20 rounded-lg focus:outline-none">
        <select class="px-4 py-3 bg-transparent border border-white/20 rounded-lg text-gray-400 focus:outline-none">
          <option>Property Type</option>
          <option>Villa</option>
          <option>Apartment</option>
          <option>Commercial</option>
        </select>
        <button class="px-6 py-3 bg-red-600 rounded-lg hover:bg-red-700 transition">
          Search
        </button>
      </div>

    </div>
  </div>

  <!-- Progress Bar -->
  <div class="absolute bottom-0 left-0 w-full h-1 bg-white/10">
    <div id="progress" class="h-full bg-red-600 w-0"></div>
  </div>

</section>
<section class="py-20 bg-gray-900">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-10 text-center">

    <div>
      <h3 class="text-4xl font-bold text-red-500">80+</h3>
      <p class="text-gray-400 mt-2">Projects in Mindanao</p>
    </div>

    <div>
      <h3 class="text-4xl font-bold text-red-500">12+</h3>
      <p class="text-gray-400 mt-2">Years in the Philippines</p>
    </div>

    <div>
      <h3 class="text-4xl font-bold text-red-500">400+</h3>
      <p class="text-gray-400 mt-2">Happy Filipino Clients</p>
    </div>

    <div>
      <h3 class="text-4xl font-bold text-red-500">6</h3>
      <p class="text-gray-400 mt-2">Mindanao Cities Covered</p>
    </div>

  </div>
</section>

<!-- ================= FEATURED PROPERTIES ================= -->
<section class="py-24 bg-gray-900">
  <div class="max-w-7xl mx-auto px-6">

    <h3 class="text-4xl text-red-500 font-bold mb-12">Featured Listings</h3>

    <div class="grid md:grid-cols-3 gap-8">

      @forelse($featuredProperties as $property)
      <!-- Card (Dynamic) -->
      <a href="{{ route('properties.show', $property->id) }}" class="bg-gray-700 rounded-2xl overflow-hidden shadow-lg hover:-translate-y-2 transition block group">
        <div class="h-64 w-full object-cover bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center relative overflow-hidden">
          @if($property->images->isNotEmpty())
            <img src="/storage/{{ $property->images->first()->image_path }}"
                 alt="{{ $property->title }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
          @elseif($property->views)
            <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-blue-500 to-purple-600">
              <div class="text-center text-white">
                <p class="text-3xl font-bold">{{ $property->views }}</p>
                <p class="text-sm">views</p>
              </div>
            </div>
          @else
            <svg class="w-20 h-20 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
          @endif
        </div>
        <div class="p-6">
          <h4 class="text-xl font-semibold text-white truncate group-hover:text-red-500 transition">{{ $property->title }}</h4>
          <p class="text-gray-400 mt-2">
            @if($property->total_rooms){{ $property->total_rooms }} Bedroom{{ $property->total_rooms > 1 ? 's' : '' }} • @endif
            {{ $property->city ?? 'Location TBA' }}
          </p>
          <p class="mt-4 text-2xl font-bold text-white">₱ {{ number_format($property->price / 1000000, 1) }}M</p>
        </div>
      </a>
      @empty
      <div class="col-span-full text-center py-12 text-gray-400">
        <p>No featured properties available yet.</p>
      </div>
      @endforelse

    </div>
  </div>
</section>

<!-- ================= PREMIUM DEVELOPMENTS ADVERTISEMENT ================= -->
<section class="relative py-32 bg-gradient-to-r from-black via-gray-950 to-black overflow-hidden">
  <!-- Animated Background Elements -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-0 left-0 w-96 h-96 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-6">
    <div class="grid lg:grid-cols-2 gap-12 items-center">

      <!-- Left Content -->
      <div class="space-y-8">
        <!-- Badge -->
        <div class="inline-block">
          <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-black px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wider">
            ⭐ Exclusive Opportunity
          </span>
        </div>

        <!-- Heading -->
        <h2 class="text-5xl lg:text-6xl font-black leading-tight">
          <span class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-500 bg-clip-text text-transparent">
            Premium Developments
          </span>
          <br>
          <span class="text-white">Reimagined Living</span>
        </h2>

        <!-- Description -->
        <p class="text-lg text-gray-300 leading-relaxed max-w-xl">
          Experience unparalleled luxury and sophistication. Our curated selection of premium property developments represents the pinnacle of modern architecture, strategic locations, and exceptional investment potential.
        </p>

        <!-- Key Features -->
        <div class="space-y-4">
          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center mt-1">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <h4 class="text-white font-semibold">Strategic Locations</h4>
              <p class="text-gray-400 text-sm">Prime locations in premium destinations</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center mt-1">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <h4 class="text-white font-semibold">Flexible Payment Plans</h4>
              <p class="text-gray-400 text-sm">Multiple financing options for your convenience</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center mt-1">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <h4 class="text-white font-semibold">Expert Guidance</h4>
              <p class="text-gray-400 text-sm">Dedicated support throughout your journey</p>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center mt-1">
              <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div>
              <h4 class="text-white font-semibold">Strong ROI Potential</h4>
              <p class="text-gray-400 text-sm">Proven track record of capital appreciation</p>
            </div>
          </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-800">
          <div>
            <div class="text-3xl font-black text-yellow-400">500+</div>
            <p class="text-sm text-gray-400 mt-2">Premium Units Available</p>
          </div>
          <div>
            <div class="text-3xl font-black text-yellow-400">98%</div>
            <p class="text-sm text-gray-400 mt-2">Client Satisfaction</p>
          </div>
          <div>
            <div class="text-3xl font-black text-yellow-400">15+</div>
            <p class="text-sm text-gray-400 mt-2">Years Experience</p>
          </div>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 pt-8">
          <a href="{{ route('premium-developments') }}"
             class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-black font-bold rounded-lg hover:shadow-2xl hover:shadow-yellow-500/50 transition-all duration-300 transform hover:scale-105 text-center">
            Explore Premium Projects
            <span class="ml-2">→</span>
          </a>
          <button
             class="px-8 py-4 border-2 border-yellow-500 text-yellow-400 font-bold rounded-lg hover:bg-yellow-500/10 transition-all duration-300 text-center">
            Schedule Private Tour
          </button>
        </div>
      </div>

      <!-- Right Showcase -->
      <div class="relative">
        <div class="grid grid-cols-2 gap-4">
          <!-- Large Featured Image -->
          <div class="col-span-2 relative rounded-2xl overflow-hidden h-80 group">
            @if($premiumDevelopments->isNotEmpty() && $premiumDevelopments->first()->images->isNotEmpty())
              <img src="/storage/{{ $premiumDevelopments->first()->images->first()->image_path }}"
                   alt="Premium Development"
                   class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            @else
              <div class="w-full h-full bg-gradient-to-br from-yellow-600 to-orange-600 flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
              </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4">
              <p class="text-yellow-400 text-sm font-bold">FEATURED PROJECT</p>
              <h3 class="text-white text-lg font-bold mt-2">{{ $premiumDevelopments->first()->title ?? 'Luxury Development' }}</h3>
            </div>
          </div>

          <!-- Smaller Cards -->
          @forelse($premiumDevelopments->skip(1)->take(2) as $dev)
          <div class="relative rounded-xl overflow-hidden h-40 group">
            @if($dev->images->isNotEmpty())
              <img src="/storage/{{ $dev->images->first()->image_path }}"
                   alt="{{ $dev->title }}"
                   class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            @else
              <div class="w-full h-full bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center">
                <svg class="w-12 h-12 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
              </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            <div class="absolute bottom-2 left-2 right-2">
              <p class="text-white text-sm font-bold truncate">{{ $dev->title }}</p>
              <p class="text-yellow-300 text-xs">₱{{ number_format($dev->price/1000000, 1) }}M</p>
            </div>
          </div>
          @empty
          <div class="relative rounded-xl overflow-hidden h-40 bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center">
            <svg class="w-12 h-12 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
          </div>
          @endforelse
        </div>

        <!-- Decorative Badge -->
        <div class="absolute -top-4 -right-4 bg-yellow-500 text-black px-6 py-3 rounded-full font-black text-lg shadow-lg transform rotate-12">
          ✨ LUXURY
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= PREMIUM DEVELOPMENTS ================= -->
<section class="py-24 bg-black">
  <div class="max-w-7xl mx-auto px-6">

    <h3 class="text-4xl text-yellow-500 font-bold mb-12">Premium Developments</h3>

    <div class="grid md:grid-cols-4 gap-6">

      @forelse($premiumDevelopments as $property)
      <!-- Premium Card -->
      <a href="{{ route('properties.show', $property->id) }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition">
        <!-- Image Container -->
        <div class="relative h-80 overflow-hidden">
          @if($property->images->isNotEmpty())
            <img src="/storage/{{ $property->images->first()->image_path }}"
                 alt="{{ $property->title }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
          @else
            <div class="w-full h-full bg-gradient-to-br from-yellow-600 to-orange-600 flex items-center justify-center">
              <svg class="w-20 h-20 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
              </svg>
            </div>
          @endif

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

          <!-- Badge -->
          <div class="absolute top-4 right-4 bg-yellow-500 text-black px-4 py-2 rounded-full text-xs font-bold">
            {{$property->completion_percentage ?? 0}}% Complete
          </div>

        </div>

        <!-- Content -->
        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
          <p class="text-sm text-yellow-400 font-semibold">{{ $property->project_name ?? $property->title }}</p>
          <h4 class="text-lg font-bold mt-2 group-hover:text-yellow-400 transition">{{ $property->title }}</h4>
          <p class="text-sm text-gray-300 mt-1">{{ $property->city ?? 'Location TBA' }}</p>

          <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-600">
            <span class="text-2xl font-bold">₱{{ number_format($property->price / 1000000, 1) }}M</span>
            <span class="text-xs bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded">{{ $property->type ?? 'Property' }}</span>
          </div>
        </div>
      </a>
      @empty
      <div class="col-span-full text-center py-12 text-gray-500">
        <p>Premium developments will appear here soon.</p>
      </div>
      @endforelse

    </div>
  </div>
</section>

<!-- ================= CALL TO ACTION ================= -->
<section class="py-24 bg-gradient-to-r from-gray-100 to-gray-500 text-center">
  <div class="max-w-3xl mx-auto px-6">
    <h3 class="text-4xl font-bold">Looking for Your Dream Property?</h3>
    <p class="text mt-4">
      Discover premium properties in prime locations with world-class amenities.
    </p>
    <button class="mt-8 px-10 py-4 bg-red-600 text-white rounded-xl font-semibold hover:scale-105 transition">
      Contact Us
    </button>
  </div>
</section>
{{-- ================= LOCATION SECTION ================= --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                Explore Property Developments by Location
            </h2>
            <p class="mt-6 text-gray-500 text-lg">
                Discover exclusive property development projects in the world's most sought-after destinations
            </p>
        </div>

        <!-- Location Grid (Dynamic from Database) -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">

            @forelse($locations as $location)
            <a href="{{ route('properties.index') }}?city={{ urlencode($location['city']) }}"
               class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group block">

                <!-- Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $location['img'] }}"
                         alt="{{ $location['city'] }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">{{ $location['city'] }}</h3>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-between p-5">
                    <span class="text-gray-600 text-sm">
                        {{ $location['count'] }} Properties
                    </span>
                    <span class="text-gray-400 group-hover:translate-x-1 transition">
                        →
                    </span>
                </div>

            </a>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                <p>No properties available yet. Check back soon for new developments!</p>
            </div>
            @endforelse

        </div>

        <!-- Country/City Filters (Dynamic) -->
        @if($locations->count() > 0)
        <div class="mt-14 flex flex-wrap justify-center gap-4">
            @foreach($locations as $location)
                <a href="{{ route('properties.index') }}?city={{ urlencode($location['city']) }}"
                   class="px-5 py-2 bg-white border border-gray-900 rounded-full text-sm
                           hover:bg-red-700 hover:text-white transition">
                    {{ $location['city'] }} ({{ $location['count'] }})
                </a>
            @endforeach
        </div>
        @endif

    </div>
</section>



{{-- ================= WHY PROPERTY DEVELOPMENTS ================= --}}
<section class="py-28 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-10">
            Why Property Developments?
        </h2>

        <div class="space-y-6 text-gray-600 text-lg leading-relaxed">

            <p>
                <strong>Strategic property development purchases</strong> offer one of the most reliable paths
                to wealth creation and modern living. Whether through pre-construction projects,
                new build properties, or off-plan developments, buying directly from developers
                provides both capital appreciation potential and access to the latest design innovations.
            </p>

            <p>
                Property developments deliver unique advantages including flexible payment structures,
                potential for significant capital growth, customization options, tax benefits, and
                modern amenities. Our platform connects you with carefully vetted developments
                from award-winning developers, ensuring quality and reliability at every step.
            </p>

            <p>
                Our curated selection spans luxury apartments, premium villas, commercial properties,
                and exclusive developments across prime global locations. Each opportunity is thoroughly
                analyzed to provide you with transparent, data-driven purchasing decisions.
            </p>

        </div>

    </div>
</section>
<!-- ================= ULTRA PREMIUM FOOTER ================= -->
<footer class="bg-black text-gray-400 pt-20 pb-10 border-t border-gray-800">

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-12">

        <!-- Company Info -->
        <div>
            <h3 class="text-white text-xl font-semibold mb-4 tracking-wide">
                REDLION DEVELOPMENT INC.
            </h3>
            <p class="text-sm leading-relaxed mb-6">
                Premium real estate developments designed for modern living.
                Building communities with vision and excellence.
            </p>

            <p class="text-sm">
                📍 East Horizon, Cugman<br>
                Cagayan de Oro City, Philippines
            </p>
            <p class="text-sm mt-2">
                📞 +63 9XX XXX XXXX<br>
                ✉️ info@redlionrealestate.com
            </p>
        </div>

        <!-- Google Map -->
        <div class="lg:col-span-2">
            <h4 class="text-white font-semibold mb-4">Our Location</h4>
            <div class="rounded-2xl overflow-hidden border border-gray-800 shadow-lg">
                <iframe
                    src="https://www.google.com/maps?q=East+Horizon+Cugman+Cagayan+de+Oro+City&output=embed"
                    width="100%"
                    height="250"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <!-- Newsletter -->
        <div>
            <h4 class="text-white font-semibold mb-4">Newsletter</h4>
            <p class="text-sm mb-4">
                Subscribe to get updates on new properties and offers.
            </p>

            <form class="flex flex-col gap-3">
                <input
                    type="email"
                    placeholder="Enter your email"
                    class="px-4 py-3 rounded-full bg-gray-900 border border-gray-700
                    focus:outline-none focus:ring-2 focus:ring-red-600
                    text-sm text-white placeholder-gray-500"
                >

                <button
                    type="submit"
                    class="px-4 py-3 rounded-full bg-red-600 text-white font-semibold
                    hover:bg-red-700 transition duration-300
                    hover:shadow-[0_0_20px_rgba(220,38,38,0.6)]">
                    Subscribe
                </button>
            </form>

            <!-- Social Icons -->
            <div class="flex gap-4 mt-6">

                <a href="#"
                class="p-3 bg-gray-900 rounded-full
                hover:bg-red-600 transition duration-300
                hover:shadow-[0_0_20px_rgba(220,38,38,0.7)]">
                    <!-- Facebook -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12a10 10 0 10-11.5 9.9v-7H7.5v-3h3V9.5c0-3 1.8-4.6 4.5-4.6 1.3 0 2.6.2 2.6.2v3h-1.5c-1.5 0-2 1-2 2v2.4h3.3l-.5 3h-2.8v7A10 10 0 0022 12z"/>
                    </svg>
                </a>

                <a href="#"
                class="p-3 bg-gray-900 rounded-full
                hover:bg-red-600 transition duration-300
                hover:shadow-[0_0_20px_rgba(220,38,38,0.7)]">
                    <!-- Instagram -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.3 1.3 0 110 2.6 1.3 1.3 0 010-2.6z"/>
                    </svg>
                </a>

                <a href="#"
                class="p-3 bg-gray-900 rounded-full
                hover:bg-red-600 transition duration-300
                hover:shadow-[0_0_20px_rgba(220,38,38,0.7)]">
                    <!-- YouTube -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21.6 7.2a3 3 0 00-2.1-2.1C17.8 4.5 12 4.5 12 4.5s-5.8 0-7.5.6a3 3 0 00-2.1 2.1A31.7 31.7 0 002 12a31.7 31.7 0 00.4 4.8 3 3 0 002.1 2.1c1.7.6 7.5.6 7.5.6s5.8 0 7.5-.6a3 3 0 002.1-2.1A31.7 31.7 0 0022 12a31.7 31.7 0 00-.4-4.8zM10 15.5v-7l6 3.5-6 3.5z"/>
                    </svg>
                </a>

            </div>

        </div>

    </div>

    <!-- Bottom -->
    <div class="mt-16 border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
        © <span id="year"></span> RedLion Development Incorporation. All rights reserved.
    </div>

</footer>


<!-- ================= SCRIPT ================= -->
<script>
  const slides = document.querySelectorAll('.slide');
  const progress = document.getElementById('progress');
  let current = 0;
  const total = slides.length;
  const duration = 5000;

  function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('opacity-100'));
    slides.forEach(slide => slide.classList.add('opacity-0'));

    slides[index].classList.remove('opacity-0');
    slides[index].classList.add('opacity-100');

    progress.style.transition = "none";
    progress.style.width = "0%";

    setTimeout(() => {
      progress.style.transition = `width ${duration}ms linear`;
      progress.style.width = "100%";
    }, 50);
  }

  function nextSlide() {
    current = (current + 1) % total;
    showSlide(current);
  }

  showSlide(current);
  setInterval(nextSlide, duration);

  // Navbar scroll effect
  window.addEventListener("scroll", function() {
    const nav = document.getElementById("navbar");
    nav.classList.toggle("bg-black/80 backdrop-blur-lg", window.scrollY > 50);
  });

   const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const navbar = document.getElementById('navbar');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Scroll effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-black/40');
            navbar.classList.add('bg-black/90', 'shadow-xl');
        } else {
            navbar.classList.remove('bg-black/90', 'shadow-xl');
            navbar.classList.add('bg-black/40');
        }
    });

    document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
