<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .fade-in { animation: fadeIn 0.8s ease-in-out; }
        .slide-up { animation: slideUp 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <a href="{{ url('/') }}" class="text-xl font-bold text-white">MediCare</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/notifications') }}" class="text-white hover:text-green-400">
                        <i class="fas fa-bell"></i>
                    </a>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white hover:text-green-400 flex items-center">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @auth
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - User Info -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 fade-in">
                    <div class="flex flex-col items-center text-center">
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff&size=128" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-green-500">
                            <button class="absolute bottom-0 right-0 bg-green-500 rounded-full p-2 text-white hover:bg-green-600 transition">
                                <i class="fas fa-camera text-sm"></i>
                            </button>
                        </div>
                        <h1 class="mt-4 text-2xl font-bold">{{ Auth::user()->name }}</h1>
                        <p class="text-gray-400">{{ Auth::user()->email }}</p>
                        <p class="mt-2 text-green-400">
                            <i class="fas fa-star mr-1"></i> Premium Member
                        </p>
                        <div class="mt-6 flex space-x-3">
                            <a href="#" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">
                                <i class="fas fa-edit mr-1"></i> Edit Profile
                            </a>
                            <a href="#" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                                <i class="fas fa-cog mr-1"></i> Settings
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt w-6 text-gray-400"></i>
                            <span class="ml-2">{{ Auth::user()->patient->PhoneNumber ?? '+1 (555) 123-4567' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt w-6 text-gray-400"></i>
                            <span class="ml-2">{{ Auth::user()->patient->HomeAddress ?? 'New York, USA' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt w-6 text-gray-400"></i>
                            <span class="ml-2">Member since {{ Auth::user()->patient->created_at ? Auth::user()->patient->created_at->format('M Y') : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column - Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Medical Records Section -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-green-400">
                            <i class="fas fa-notes-medical mr-2"></i> Medical Records
                        </h2>
                        <a href="#" class="text-sm text-green-400 hover:text-green-300">View All</a>
                    </div>
                    <div class="space-y-4">
                        @forelse([1,2] as $record)
                            <div class="p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-medium">General Checkup - Dr. Sarah Johnson</h3>
                                        <p class="text-sm text-gray-400">{{ now()->subDays(rand(1, 30))->format('M d, Y') }}</p>
                                    </div>
                                    <span class="text-xs px-2 py-1 bg-green-900 text-green-300 rounded-full">Completed</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400">No medical records found.</p>
                        @endforelse
                    </div>
                </div>

            <!-- Prescriptions Section -->
            <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-green-400">
                        <i class="fas fa-prescription-bottle-alt mr-2"></i> Current Prescriptions
                    </h2>
                    <a href="{{ url('/prescriptions') }}" class="text-sm text-green-400 hover:text-green-300">View All</a>
                </div>
                <div class="space-y-4">
                    @forelse($prescriptions as $prescription)
                        <div class="p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium">
                                        {{ $prescription->medication->Name ?? 'Error Med Not Found' }}
                                        {{ $prescription->Dosage }}
                                    </h3>
                                    <p class="text-sm text-gray-400">
                                        Take as prescribed by Dr. {{ $prescription->doctor->LastName ?? 'Unknown' }}
                                    </p>
                                    <p class="text-sm text-gray-400">
                                        Refills: {{ $prescription->RefillsRemaining }} remaining
                                    </p>
                                </div>
                                <button class="text-green-400 hover:text-green-300">
                                    <i class="fas fa-sync-alt"></i> Refill
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400">No active prescriptions.</p>
                    @endforelse
                </div>
            </div>

                <!-- Upcoming Appointments -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-green-400">
                            <i class="fas fa-calendar-check mr-2"></i> Upcoming Appointments
                        </h2>
                        <a href="#" class="text-sm text-green-400 hover:text-green-300">Schedule New</a>
                    </div>
                    <div class="space-y-4">
                        @if(rand(0,1))
                            <div class="p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-medium">Annual Physical</h3>
                                        <p class="text-sm text-gray-400">Dr. James Wilson</p>
                                        <p class="text-sm text-gray-400">{{ now()->addDays(rand(1, 14))->format('M d, Y') }} at 10:30 AM</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="text-xs px-2 py-1 bg-blue-900 text-blue-300 rounded-lg hover:bg-blue-800">
                                            <i class="fas fa-video mr-1"></i> Join
                                        </button>
                                        <button class="text-xs px-2 py-1 bg-red-900 text-red-300 rounded-lg hover:bg-red-800">
                                            <i class="fas fa-times mr-1"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-gray-400">No upcoming appointments. Schedule your next visit.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endauth

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 mt-auto">
        <div class="container mx-auto px-4 text-center text-gray-400 text-sm">
            &copy; 2025 MediCare. All rights reserved.
        </div>
    </footer>
</body>
</html>
