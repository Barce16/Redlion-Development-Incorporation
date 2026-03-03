<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Redlion Development Incorporation</title>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
body {
  font-family: 'Poppins', sans-serif;
}
.hero-gradient {
  background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}
.red-glow {
  box-shadow: 0 0 60px rgba(220, 38, 38, 0.3);
}
.grid-pattern {
  background-image:
    linear-gradient(90deg, rgba(220, 38, 38, 0.05) 1px, transparent 1px),
    linear-gradient(rgba(220, 38, 38, 0.05) 1px, transparent 1px);
  background-size: 50px 50px;
}
</style>
</head>

<body class="bg-white text-gray-900">

<!-- ================= MODERN NAVBAR ================= -->
<header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-500 bg-white/80 backdrop-blur-xl border-b border-red-100">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-lg hero-gradient flex items-center justify-center text-white font-bold text-lg">
                R
            </div>
            <div class="leading-tight">
                <h1 class="text-lg font-bold tracking-tight text-gray-900">REDLION</h1>
                <span class="text-xs text-red-600 font-semibold tracking-wider">DEVELOPMENTS</span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="/" class="text-gray-700 hover:text-red-600 transition relative group">
                Home
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="{{ route('properties.index') }}" class="text-gray-700 hover:text-red-600 transition relative group">
                Properties
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="{{ route('premium-developments') }}" class="text-gray-700 hover:text-red-600 transition relative group">
                Premium
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#" class="text-gray-700 hover:text-red-600 transition relative group">
                Contact
                <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-red-600 transition-all duration-300 group-hover:w-full"></span>
            </a>

            <div class="h-5 w-px bg-gray-300"></div>

            <a href="auth/login" class="px-6 py-2.5 hero-gradient text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-red-500/50 transition-all duration-300 transform hover:scale-105">
                Login
            </a>
        </nav>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden text-gray-900 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-red-100">
        <div class="flex flex-col space-y-4 px-6 py-6 text-gray-700">
            <a href="/" class="hover:text-red-600 transition font-medium">Home</a>
            <a href="{{ route('properties.index') }}" class="hover:text-red-600 transition font-medium">Properties</a>
            <a href="{{ route('premium-developments') }}" class="hover:text-red-600 transition font-medium">Premium</a>
            <a href="#" class="hover:text-red-600 transition font-medium">Contact</a>
            <div class="border-t border-gray-200 pt-4 space-y-3">
                <a href="auth/login" class="block text-center py-2.5 hero-gradient text-white font-semibold rounded-lg">Login</a>
            </div>
        </div>
    </div>
</header>

<!-- ================= MODERN HERO SECTION ================= -->
<section class="relative pt-32 pb-24 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 grid-pattern opacity-30"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-red-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <div class="inline-block">
                    <span class="inline-block px-4 py-2 bg-red-50 border border-red-200 rounded-full text-sm font-semibold text-red-600">
                        🏆 Award-Winning Developer
                    </span>
                </div>

                <h1 class="text-6xl lg:text-7xl font-black leading-tight text-gray-900">
                    Building Your
                    <span class="bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent">
                        Dream Home
                    </span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-lg">
                    Discover premium residential and commercial developments crafted with precision. Your journey to owning a luxury property starts here.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('properties.index') }}" class="px-8 py-4 hero-gradient text-white font-semibold rounded-xl hover:shadow-2xl hover:shadow-red-500/40 transition-all duration-300 transform hover:scale-105 text-center">
                        Explore Properties
                    </a>
                    <button class="px-8 py-4 border-2 border-red-600 text-red-600 font-semibold rounded-xl hover:bg-red-50 transition-all duration-300">
                        Schedule Tour
                    </button>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-200">
                    <div>
                        <div class="text-3xl font-black text-red-600">500+</div>
                        <p class="text-sm text-gray-600 mt-1">Properties</p>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-red-600">50K+</div>
                        <p class="text-sm text-gray-600 mt-1">Happy Clients</p>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-red-600">20+</div>
                        <p class="text-sm text-gray-600 mt-1">Years Experience</p>
                    </div>
                </div>
            </div>

            <!-- Right Hero Image -->
            <div class="relative hidden lg:block">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600 to-red-700 rounded-3xl blur-3xl opacity-30"></div>
                <div class="relative bg-gradient-to-br from-red-50 to-red-100 rounded-3xl p-8 overflow-hidden">
                    <div class="absolute inset-0 grid-pattern opacity-10"></div>
                    <div class="relative h-80 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center">
                        <svg class="w-32 h-32 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FEATURED PROPERTIES ================= -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-3">
                    Featured <span class="text-red-600">Listings</span>
                </h2>
                <p class="text-gray-600">Premium properties handpicked for you</p>
            </div>
            <a href="{{ route('properties.index') }}" class="hidden sm:block text-red-600 hover:text-red-700 font-semibold">View All →</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($featuredProperties as $property)
            <a href="{{ route('properties.show', $property->id) }}" class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <div class="relative h-56 overflow-hidden bg-gradient-to-br from-red-600 to-red-700">
                    @if($property->featured_image)
                        <img src="/storage/{{ $property->featured_image }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @elseif($property->images->isNotEmpty())
                        <img src="/storage/{{ $property->images->first()->image_path }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-20 h-20 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
                <div class="p-6">
                    <p class="text-sm font-semibold text-red-600 uppercase tracking-wide">{{ $property->project_name ?? 'Featured' }}</p>
                    <h3 class="text-xl font-bold text-gray-900 mt-2 group-hover:text-red-600 transition">{{ $property->title }}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{ $property->city }}</p>
                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200">
                        <span class="text-2xl font-black text-red-600">₱{{ number_format($property->price / 1000000, 1) }}M</span>
                        <span class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full font-semibold">{{ $property->type ?? 'Property' }}</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">
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

<!-- ================= CTA SECTION ================= -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-700 text-white">
    <div class="max-w-4xl mx-auto text-center px-6">
        <h2 class="text-5xl font-black mb-4">Ready to Invest?</h2>
        <p class="text-lg text-red-50 mb-8">
            Find your perfect property today. Our team is here to help you every step of the way.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-white text-red-600 font-bold rounded-lg hover:bg-gray-100 transition">
                Schedule Consultation
            </button>
            <a href="{{ route('properties.index') }}" class="px-8 py-4 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition">
                Browse Properties
            </a>
        </div>
    </div>
</section>

<!-- ================= LOCATION SECTION ================= -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Properties by <span class="text-red-600">Location</span>
            </h2>
            <p class="text-gray-600 text-lg">
                Discover exceptional developments across prime destinations
            </p>
        </div>

        <!-- Location Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
            @forelse($locations as $location)
            <a href="{{ route('properties.index') }}?city={{ urlencode($location['city']) }}"
               class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $location['img'] }}"
                         alt="{{ $location['city'] }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-bold">{{ $location['city'] }}</h3>
                    </div>
                </div>
                <div class="flex items-center justify-between p-5">
                    <span class="text-gray-600 text-sm font-medium">{{ $location['count'] }} Properties</span>
                    <span class="text-red-600 group-hover:translate-x-1 transition font-bold">→</span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                <p>No properties available yet.</p>
            </div>
            @endforelse
        </div>

        <!-- Quick Filters -->
        @if($locations->count() > 0)
        <div class="mt-14 flex flex-wrap justify-center gap-3">
            @foreach($locations as $location)
                <a href="{{ route('properties.index') }}?city={{ urlencode($location['city']) }}"
                   class="px-5 py-2.5 bg-white border-2 border-gray-300 text-gray-700 rounded-full text-sm font-medium
                           hover:border-red-600 hover:bg-red-50 transition">
                    {{ $location['city'] }}
                </a>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- ================= WHY CHOOSE US ================= -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-black text-gray-900 text-center mb-16">
            Why Choose <span class="text-red-600">Redlion</span>?
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-red-50 rounded-2xl p-8 border border-red-100 hover:border-red-300 transition">
                <div class="w-14 h-14 bg-red-600 rounded-lg flex items-center justify-center mb-4 text-white text-2xl">🏗️</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Built</h3>
                <p class="text-gray-600">Each project is crafted with premium materials and expert construction standards.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-red-50 rounded-2xl p-8 border border-red-100 hover:border-red-300 transition">
                <div class="w-14 h-14 bg-red-600 rounded-lg flex items-center justify-center mb-4 text-white text-2xl">📍</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Prime Locations</h3>
                <p class="text-gray-600">Strategically positioned properties in high-demand areas with strong growth potential.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-red-50 rounded-2xl p-8 border border-red-100 hover:border-red-300 transition">
                <div class="w-14 h-14 bg-red-600 rounded-lg flex items-center justify-center mb-4 text-white text-2xl">💰</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Flexible Payments</h3>
                <p class="text-gray-600">Multiple payment schemes and financing options to suit your budget.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-red-50 rounded-2xl p-8 border border-red-100 hover:border-red-300 transition">
                <div class="w-14 h-14 bg-red-600 rounded-lg flex items-center justify-center mb-4 text-white text-2xl">🤝</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Support</h3>
                <p class="text-gray-600">Dedicated team to guide you through every step of your property journey.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-gray-400 pt-20 pb-10 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-12">
        <!-- Company Info -->
        <div>
            <h3 class="text-white text-xl font-bold mb-4">REDLION</h3>
            <p class="text-sm leading-relaxed mb-6">
                Premium real estate developments designed for modern living and exceptional investment returns.
            </p>
            <p class="text-sm">
                📍 East Horizon, Cugman<br>
                Cagayan de Oro City, Philippines
            </p>
            <p class="text-sm mt-3">
                📞 +63 9XX XXX XXXX<br>
                ✉️ info@redlionrealestate.com
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="text-white font-bold mb-6">Quick Links</h4>
            <ul class="space-y-3 text-sm">
                <li><a href="/" class="hover:text-red-600 transition">Home</a></li>
                <li><a href="{{ route('properties.index') }}" class="hover:text-red-600 transition">Properties</a></li>
                <li><a href="{{ route('premium-developments') }}" class="hover:text-red-600 transition">Premium</a></li>
                <li><a href="#" class="hover:text-red-600 transition">Contact</a></li>
            </ul>
        </div>

        <!-- Google Map -->
        <div class="lg:col-span-2">
            <h4 class="text-white font-bold mb-4">Our Location</h4>
            <div class="rounded-xl overflow-hidden border border-gray-700">
                <iframe
                    src="https://www.google.com/maps?q=East+Horizon+Cugman+Cagayan+de+Oro+City&output=embed"
                    width="100%"
                    height="200"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Newsletter & Social -->
    <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-gray-800">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Newsletter -->
            <div>
                <h4 class="text-white font-bold mb-3">Subscribe to Our Newsletter</h4>
                <form class="flex gap-2">
                    <input
                        type="email"
        placeholder="Enter your email"
                        class="flex-1 px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 text-white text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600"
                    >
                    <button
                        type="submit"
                        class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition">
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Social Icons -->
            <div class="flex gap-4 md:justify-end">
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.5 9.9v-7H7.5v-3h3V9.5c0-3 1.8-4.6 4.5-4.6 1.3 0 2.6.2 2.6.2v3h-1.5c-1.5 0-2 1-2 2v2.4h3.3l-.5 3h-2.8v7A10 10 0 0022 12z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.3 1.3 0 110 2.6 1.3 1.3 0 010-2.6z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M21.6 7.2a3 3 0 00-2.1-2.1C17.8 4.5 12 4.5 12 4.5s-5.8 0-7.5.6a3 3 0 00-2.1 2.1A31.7 31.7 0 002 12a31.7 31.7 0 00.4 4.8 3 3 0 002.1 2.1c1.7.6 7.5.6 7.5.6s5.8 0 7.5-.6a3 3 0 002.1-2.1A31.7 31.7 0 0022 12a31.7 31.7 0 00-.4-4.8zM10 15.5v-7l6 3.5-6 3.5z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="max-w-7xl mx-auto px-6 mt-8 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
        © 2026 REDLION Development Incorporation. All rights reserved.
    </div>
</footer>

<!-- ================= SCRIPTS ================= -->
<script>
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const navbar = document.getElementById('navbar');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });

  // Navbar scroll effect
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('shadow-lg');
    } else {
      navbar.classList.remove('shadow-lg');
    }
  });

  document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>
