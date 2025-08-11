<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications - MediCare Pharmacy</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <!-- Header -->
    <header class="bg-indigo-900 shadow-lg" x-data="{open: false}">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 fade-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <span class="text-2xl font-bold text-white">MediCare</span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 fade-in">
                    <a href="{{ url('/') }}" class="text-white hover:text-green-400 transition duration-300">Home</a>
                    <a href="{{ url('/medications') }}" class="text-green-400 font-bold transition duration-300">Medications</a>
                    <a href="#" class="text-white hover:text-green-400 transition duration-300">About Us</a>
                    <a href="#" class="text-white hover:text-green-400 transition duration-300">Contact</a>
                </nav>

                <div class="flex items-center space-x-2 fade-in">
                    <!-- Login/Profile Button -->
                    @auth
                        <p class="border-r-2 pr-2">Hello {{ Auth::user()->name}}</p>
                        <a href="{{ url('/profile') }}" class="p-2 rounded-full border border-gray-1000 hover:bg-gray-700 transition duration-150 ease-in-out">
                            <svg class="w-8 h-8 rounded-full" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </a>
                    @endauth

                    @guest
                        <a href="{{ url('/login') }}" class="bg-green-500 hover:bg-green-600 text-white py-3 px-5 rounded-lg transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Login
                        </a>
                        <a href="{{ url('/register') }}" class="bg-red-500 hover:bg-red-600 text-white py-3 px-3 rounded-lg transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Register
                        </a>
                    @endguest

                    <!-- Cart Button -->
                    <a href="{{ route('cart.index') }}" class="p-2 rounded-full border border-gray-600 hover:bg-gray-700 transition duration-150 ease-in-out relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m 0L7 13m0 0l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                        </svg>
                        @auth
                            {{-- Ugly! But works for now :) --}}
                            @php
                                $cartCount = \App\Models\CartItems::where('user_id', auth()->id())->sum('Quantity');
                            @endphp

                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                            @endif
                        @endauth
                    </a>

                </div>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="py-8 bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center fade-in">
                <h1 class="text-4xl font-bold text-green-400 mb-4">All Medications</h1>
                <p class="text-xl text-gray-300">Browse our complete collection of quality medications</p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-6 bg-gray-800 border-b border-gray-700" x-data="{ showFilters: false }">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-center space-x-4 mb-4 lg:mb-0">
                    <button
                            class="bg-indigo-900 hover:bg-indigo-800 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filters
                    </button>

                    <div class="flex items-center space-x-2">
                        <span class="text-gray-300">Sort by:</span>
                        <select class="bg-gray-700 text-white rounded-lg px-3 py-2 border border-gray-600">
                            <option>Name A-Z</option>
                            <option>Price Low-High</option>
                            <option>Price High-Low</option>
                            <option>In Stock</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="text-gray-300">Showing {{ $medications->count() }} of {{ $medications->total() ?? $medications->count() }} medications</span>
                </div>
            </div>

            <!-- Filter Panel -->
            <div x-show="showFilters" x-transition class="mt-6 p-4 bg-gray-700 rounded-lg" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-white font-bold mb-2">Category</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>Prescription</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>Over the Counter</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2">Price Range</label>
                        <div class="flex space-x-2">
                            <input type="number" placeholder="Min" class="bg-gray-600 text-white rounded px-2 py-1 w-20">
                            <span class="self-center">-</span>
                            <input type="number" placeholder="Max" class="bg-gray-600 text-white rounded px-2 py-1 w-20">
                        </div>
                    </div>

                    <div>
                        <label class="block text-white font-bold mb-2">Availability</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>In Stock</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span>Limited Stock</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Medications Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 product-grid">
                @foreach($medications as $index => $medication)
                    <!-- Product {{ $index + 1 }} -->
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 bounce-in"
                         style="animation-delay: {{ ($index % 20) * 0.05 }}s;">
                        <div class="relative">
                            @if($medication->badge)
                                <span class="absolute top-0 right-0 {{ $medication->badge['class'] }} text-white text-sm font-bold px-3 py-1 m-2 rounded">
                                    {{ $medication->badge['text'] }}
                                </span>
                            @endif
                            <img src="{{ URL::asset('/img/medications/' . ['pill1.jpg', 'pill2.jpg', 'pill3.jpg', 'pill4.jpg', 'capsule1.jpg', 'capsule2.jpg', 'tablet1.jpg', 'tablet2.jpg'][array_rand(['pill1.jpg', 'pill2.jpg', 'pill3.jpg', 'pill4.jpg', 'capsule1.jpg', 'capsule2.jpg', 'tablet1.jpg', 'tablet2.jpg'])]) }}"
                                 alt="{{ $medication->Name }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <span class="text-green-400 font-bold text-lg">
                                ${{ number_format($medication->DefaultUnitPrice, 2) }}
                            </span>
                            <h3 class="text-lg font-bold mt-1">{{ $medication->display_name }}</h3>
                            <p class="text-gray-400 mt-1 text-sm">
                                @if($medication->GenericName && $medication->GenericName !== $medication->Name)
                                    Generic: {{ $medication->GenericName }}
                                @else
                                    {{ $medication->manufacturer->Name ?? 'Quality medication' }}
                                @endif
                            </p>

                            <div class="flex items-center mt-2">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= 4)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-400 ml-1 text-sm">({{ rand(15, 95) }})</span>
                            </div>

                            <div class="mt-2">
                                @if($medication->Stock > 20)
                                    <span class="text-green-400 text-xs">✓ In Stock ({{ $medication->Stock }})</span>
                                @elseif($medication->Stock > 0)
                                    <span class="text-yellow-400 text-xs">⚠ Limited ({{ $medication->Stock }})</span>
                                @else
                                    <span class="text-red-400 text-xs">✗ Out of Stock</span>
                                @endif
                            </div>

                            @if($medication->Stock > 0)
                                @auth
                                    <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="medication_id" value="{{ $medication->MedicationID }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                                class="w-full bg-indigo-900 hover:bg-indigo-800 text-white py-2 px-3 rounded-lg transition duration-300 flex items-center justify-center text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                            </svg>
                                            Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="mt-3 w-full bg-indigo-900 hover:bg-indigo-800 text-white py-2 px-3 rounded-lg transition duration-300 flex items-center justify-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Login to Buy
                                    </a>
                                @endauth
                            @else
                                <!-- Out of stock -->
                                <button disabled
                                        class="mt-3 w-full bg-gray-600 text-gray-400 py-2 px-3 rounded-lg cursor-not-allowed opacity-50 text-sm">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($medications, 'links'))
                <div class="mt-12 flex justify-center">
                    {{ $medications->links() }}
                </div>
            @endif
        </div>
    </section>

    <section class="bg-indigo-900 py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-2xl font-bold text-white mb-2">Need help finding a medication?</h3>
                    <p class="text-gray-300">Our pharmacists are here to help you find what you need.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        Contact Pharmacist
                    </a>
                    <a href="#" class="bg-transparent border border-green-500 text-green-500 hover:bg-green-500 hover:text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        Upload Prescription
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- TODO --}}
    <!--Footer-->

</body>
</html>
