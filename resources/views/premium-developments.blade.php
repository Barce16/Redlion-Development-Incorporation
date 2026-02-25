<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Premium Developments - Redlion Development Incorporation</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #fbbf24 0%, #f97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>

<body class="bg-black text-white">

<!-- ================= HEADER ================= -->
<header class="fixed top-0 left-0 w-full z-50 bg-black/80 backdrop-blur-md border-b border-gray-800">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <a href="/" class="flex items-center gap-3 hover:scale-105 transition">
            <div class="leading-tight">
                <h1 class="text-xl font-bold tracking-wider">REDLION</h1>
                <span class="text-xs text-gray-400">PREMIUM</span>
            </div>
        </a>
        <nav class="hidden md:flex items-center gap-6">
            <a href="/" class="text-gray-300 hover:text-yellow-400 transition">Home</a>
            <a href="{{ route('properties.index') }}" class="text-gray-300 hover:text-yellow-400 transition">All Properties</a>
            <a href="#" class="px-4 py-2 bg-yellow-500 text-black rounded-lg font-semibold hover:bg-yellow-600 transition">Contact</a>
        </nav>
    </div>
</header>

<!-- ================= HERO SECTION ================= -->
<section class="relative pt-32 pb-20 bg-gradient-to-b from-black via-gray-950 to-black overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-72 h-72 bg-orange-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <span class="inline-block bg-gradient-to-r from-yellow-500 to-orange-500 text-black px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wider mb-6">
            ⭐ EXCLUSIVE COLLECTION
        </span>

        <h1 class="text-6xl md:text-7xl font-black leading-tight mt-6 mb-6">
            <span class="gradient-text">Premium</span>
            <br>
            <span>Luxury Developments</span>
        </h1>

        <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-8 leading-relaxed">
            Discover the finest collection of premium property developments crafted for those who demand excellence. Each project represents sophistication, strategic positioning, and unparalleled investment value.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-black font-bold rounded-lg hover:shadow-2xl hover:shadow-yellow-500/50 transition-all transform hover:scale-105">
                Schedule Premium Tour
            </button>
            <button class="px-8 py-4 border-2 border-yellow-500 text-yellow-400 font-bold rounded-lg hover:bg-yellow-500/10 transition">
                Inquiry Form
            </button>
        </div>
    </div>
</section>

<!-- ================= FEATURED PREMIUM DEVELOPMENT ================= -->
@if($premiumDevelopments->isNotEmpty())
<section class="py-24 bg-black border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-black mb-12">
            <span class="gradient-text">Headline Project</span>
        </h2>

        @php $featured = $premiumDevelopments->first(); @endphp

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div class="relative rounded-2xl overflow-hidden h-96 group">
                @if($featured->images->isNotEmpty())
                    <img src="/storage/{{ $featured->images->first()->image_path }}"
                         alt="{{ $featured->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-yellow-600 to-orange-600 flex items-center justify-center">
                        <svg class="w-32 h-32 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute top-4 right-4 bg-yellow-500 text-black px-4 py-2 rounded-lg font-bold">
                    {{ $featured->completion_percentage ?? 0 }}% Complete
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-8">
                <div>
                    <p class="text-yellow-400 font-bold text-sm uppercase tracking-wider">{{ $featured->project_name ?? 'Premium Project' }}</p>
                    <h3 class="text-4xl font-black mt-3">{{ $featured->title }}</h3>
                </div>

                <p class="text-gray-300 text-lg leading-relaxed">
                    {{ $featured->description ?? 'Experience the pinnacle of luxury living with world-class amenities and strategic location advantages.' }}
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-900/50 rounded-lg p-4 border border-gray-800">
                        <p class="text-gray-400 text-sm">Developer</p>
                        <p class="text-white font-bold mt-1">{{ $featured->developer_company ?? 'Redlion Development Inc.' }}</p>
                    </div>
                    <div class="bg-gray-900/50 rounded-lg p-4 border border-gray-800">
                        <p class="text-gray-400 text-sm">Location</p>
                        <p class="text-white font-bold mt-1">{{ $featured->city }}, {{ $featured->province }}</p>
                    </div>
                    <div class="bg-gray-900/50 rounded-lg p-4 border border-gray-800">
                        <p class="text-gray-400 text-sm">Starting Price</p>
                        <p class="text-yellow-400 font-bold text-2xl mt-1">₱{{ number_format($featured->price/1000000, 1) }}M</p>
                    </div>
                    <div class="bg-gray-900/50 rounded-lg p-4 border border-gray-800">
                        <p class="text-gray-400 text-sm">Property Type</p>
                        <p class="text-white font-bold mt-1 capitalize">{{ $featured->type }}</p>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <a href="{{ route('properties.show', $featured->id) }}"
                       class="flex-1 px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-black font-bold rounded-lg hover:shadow-lg transition text-center">
                        View Full Details
                    </a>
                    <button class="px-6 py-3 border-2 border-yellow-500 text-yellow-400 font-bold rounded-lg hover:bg-yellow-500/10 transition">
                        Inquiry
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ================= PREMIUM SHOWCASE GRID ================= -->
<section class="py-24 bg-black">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-black">
                <span class="gradient-text">Premium Collection</span>
            </h2>
            <a href="{{ route('properties.index') }}" class="text-yellow-400 font-semibold hover:text-yellow-300 transition">
                View All →
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($premiumDevelopments as $development)
            <div class="group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-yellow-500/30 transition">
                <!-- Image -->
                <div class="relative h-64 overflow-hidden bg-gradient-to-br from-yellow-600 to-orange-600">
                    @if($development->images->isNotEmpty())
                        <img src="/storage/{{ $development->images->first()->image_path }}"
                             alt="{{ $development->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-20 h-20 text-white opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                    <!-- Badge -->
                    <div class="absolute top-4 right-4 bg-yellow-500 text-black px-3 py-1 rounded-full text-xs font-bold">
                        {{ $development->completion_percentage ?? 0 }}%
                    </div>
                </div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <p class="text-yellow-300 text-xs uppercase font-bold tracking-wider">{{ $development->project_name ?? 'Project' }}</p>
                    <h3 class="text-lg font-black text-white mt-2 group-hover:text-yellow-300 transition">{{ $development->title }}</h3>
                    <p class="text-sm text-gray-300 mt-1">{{ $development->city }}</p>

                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-600">
                        <span class="text-2xl font-black text-yellow-400">₱{{ number_format($development->price/1000000, 1) }}M</span>
                        <a href="{{ route('properties.show', $development->id) }}"
                           class="inline-block px-4 py-2 bg-yellow-500 text-black rounded-lg font-bold text-sm hover:bg-yellow-600 transition">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                <p>Premium developments coming soon...</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ================= PREMIUM FEATURES ================= -->
<section class="py-24 bg-gray-950 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-black mb-12 text-center">
            <span class="gradient-text">Why Choose Premium Developments</span>
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v4h8v-4zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Expert Advisory</h3>
                <p class="text-gray-400">Dedicated investment advisors to guide your decision-making process</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a1 1 0 001 1h14a1 1 0 001-1V6a2 2 0 00-2-2H4zm0 4v4a2 2 0 002 2h8a2 2 0 002-2V8H4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Flexible Financing</h3>
                <p class="text-gray-400">Multiple payment schemes and bank financing options available</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Prime Locations</h3>
                <p class="text-gray-400">Strategic locations with high demand and growth potential</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 3.062v6.757a1 1 0 01-.940 1.069 60 60 0 00-3.197.405 1 1 0 00-.844 1.59l.94 1.567a1 1 0 001.743-.067c.447-.282.76-.645.82-1.03a24 24 0 0040-7.747V6.517c0-1.583-.947-3.033-2.312-3.714-1.365-.68-3.023-.722-4.529-.1a3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 00-2.812 3.062v6.757a1 1 0 01-.940 1.069 60 60 0 00-3.197.405 1 1 0 00-.844 1.59l.94 1.567a1 1 0 001.743-.067c.447-.282.76-.645.82-1.03a24 24 0 0040-7.747V6.517c0-1.583-.947-3.033-2.312-3.714-1.365-.68-3.023-.722-4.529-.1a3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 00-2.812 3.062v6.757a1 1 0 01-.940 1.069 60 60 0 00-3.197.405 1 1 0 00-.844 1.59l.94 1.567a1 1 0 001.743-.067c.447-.282.76-.645.82-1.03a24 24 0 0040-7.747V6.517z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">World-Class Amenities</h3>
                <p class="text-gray-400">Premium facilities and modern architectural design</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155.03.299.076.438.114a.773.773 0 00.158-.031.393.393 0 00-.2-.058c-.117 0-.235-.031-.357-.119a.466.466 0 00-.115-.095.532.532 0 00-.14-.03.5.5 0 00-.296.074l.05.05c.016.016.032.032.05.05a.426.426 0 01.057.04c.034.015.07.027.107.035z"/>
                        <path fill-rule="evenodd" d="M18.335 18.339H1.59V2.3h16.745v16.04zM1.591 1.285h16.745a1.025 1.025 0 011.025 1.025v16.04a1.025 1.025 0 01-1.025 1.025H1.59a1.025 1.025 0 01-1.025-1.025V2.31a1.025 1.025 0 011.025-1.025z" clip-rule="evenodd"/>
                        <path d="M6.769 9.282H13v1.286H6.769z"/>
                        <path d="M6.769 11.555h6.231v1.286H6.769z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Transparent Pricing</h3>
                <p class="text-gray-400">Clear documentation and no hidden charges</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-black rounded-xl p-8 border border-gray-800 hover:border-yellow-500/50 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Strong ROI Potential</h3>
                <p class="text-gray-400">Proven track record of capital appreciation and returns</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-24 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 text-black">
    <div class="max-w-4xl mx-auto text-center px-6">
        <h2 class="text-5xl font-black mb-6">Ready to Invest in Premium?</h2>
        <p class="text-lg font-semibold mb-8 opacity-90">
            Connect with our premium development specialists today and discover exclusive opportunities.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-black text-yellow-400 font-bold rounded-lg hover:bg-gray-900 transition">
                Schedule Premium Consultation
            </button>
            <button class="px-8 py-4 border-2 border-black text-black font-bold rounded-lg hover:bg-black/10 transition">
                Get Brochure
            </button>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-black border-t border-gray-800 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="text-yellow-400 font-bold mb-3">REDLION</h3>
                <p class="text-sm text-gray-400">Premium real estate developments for discerning investors.</p>
            </div>
            <div>
                <h4 class="font-bold mb-3">Quick Links</h4>
                <ul class="space-y-1 text-sm text-gray-400">
                    <li><a href="/" class="hover:text-yellow-400 transition">Home</a></li>
                    <li><a href="{{ route('properties.index') }}" class="hover:text-yellow-400 transition">Properties</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">About</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-3">Contact</h4>
                <p class="text-sm text-gray-400">📞 +63 XXX XXX XXXX</p>
                <p class="text-sm text-gray-400">✉️ premium@redlion.com</p>
            </div>
            <div>
                <h4 class="font-bold mb-3">Follow Us</h4>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-yellow-400 transition">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-yellow-400 transition">Instagram</a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-500">
            <p>&copy;  2026 REDLION Development Incorporation. All Rights Reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
