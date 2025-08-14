<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - My Prescriptions</title>
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
                    <a href="{{ url('#') }}" class="text-white hover:text-green-400">
                        <i class="fas fa-bell"></i>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
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
            <!-- Left Column - Quick Stats -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 fade-in">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-500 rounded-full mb-4">
                            <i class="fas fa-prescription-bottle-alt text-2xl text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold mb-2">My Prescriptions</h2>
                        <p class="text-gray-400 mb-6">Manage your medications and refills</p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-pills w-6 text-green-400"></i>
                                <span class="ml-2">Active Prescriptions</span>
                            </div>
                            <span class="font-bold text-green-400">{{ $prescriptions->where('RefillsRemaining', '>', 0)->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-sync-alt w-6 text-yellow-400"></i>
                                <span class="ml-2">Refills Available</span>
                            </div>
                            <span class="font-bold text-yellow-400">{{ $prescriptions->sum('RefillsRemaining') }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt w-6 text-blue-400"></i>
                                <span class="ml-2">Total Prescriptions</span>
                            </div>
                            <span class="font-bold text-blue-400">{{ $prescriptions->count() }}</span>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-6 space-y-3">
                        <a href="{{ url('#') }}" class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition text-center block">
                            <i class="fas fa-plus mr-1"></i> Request Prescription
                        </a>
                        <a href="{{ route('show.profile') }}" class="w-full px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition text-center block">
                            <i class="fas fa-user mr-1"></i> Back to Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column - Prescriptions List -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Filter Section -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <div class="flex flex-wrap gap-4 items-center">
                        <h3 class="text-lg font-semibold text-green-400">Filter Prescriptions</h3>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-green-600 text-white rounded-full text-sm">All</button>
                            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded-full text-sm">Active</button>
                            <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded-full text-sm">Expired</button>
                        </div>
                    </div>
                </div>

                <!-- Active Prescriptions -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-green-400">
                            <i class="fas fa-prescription-bottle-alt mr-2"></i> Active Prescriptions
                        </h2>
                        <span class="text-sm text-gray-400">{{ $prescriptions->where('RefillsRemaining', '>', 0)->count() }} active</span>
                    </div>
                    <div class="space-y-4">
                        @forelse($prescriptions->where('RefillsRemaining', '>', 0) as $prescription)
                            <div class="p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                                <div class="flex justify-between items-start">
                                    <div class="flex-grow">
                                        <div class="flex items-center mb-2">
                                            <h3 class="font-medium text-lg">
                                                {{ $prescription->medication->Name ?? 'Unknown Medication' }}
                                            </h3>
                                            @if($prescription->Dosage)
                                                <span class="ml-2 px-2 py-1 bg-blue-900 text-blue-300 rounded-full text-xs">
                                                    {{ $prescription->Dosage }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-gray-400">
                                            <p><i class="fas fa-user-md mr-1"></i> Dr. {{ $prescription->doctor->FirstName ?? '' }} {{ $prescription->doctor->LastName ?? 'Unknown Doctor' }}</p>
                                            <p><i class="fas fa-calendar mr-1"></i> Prescribed: {{ $prescription->PrescriptionDate->format('M d, Y') }}</p>
                                            <p><i class="fas fa-pills mr-1"></i> Quantity: {{ $prescription->QuantityPrescribed }}</p>
                                            <p><i class="fas fa-sync-alt mr-1"></i> Refills: {{ $prescription->RefillsRemaining }} of {{ $prescription->RefillsAllowed }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition text-sm">
                                            <i class="fas fa-sync-alt mr-1"></i> Refill
                                        </button>
                                        <button class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition text-sm">
                                            <i class="fas fa-info-circle mr-1"></i> Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <i class="fas fa-prescription-bottle-alt text-4xl text-gray-600 mb-4"></i>
                                <p class="text-gray-400">No active prescriptions found.</p>
                                <a href="{{ url('#') }}" class="mt-4 inline-block px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">
                                    Request New Prescription
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- All Prescriptions History -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-700 slide-up">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-300">
                            <i class="fas fa-history mr-2"></i> Prescription History
                        </h2>
                        <span class="text-sm text-gray-400">{{ $prescriptions->count() }} total</span>
                    </div>
                    <div class="space-y-4">
                        @forelse($prescriptions->sortByDesc('PrescriptionDate') as $prescription)
                            <div class="p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition">
                                <div class="flex justify-between items-start">
                                    <div class="flex-grow">
                                        <div class="flex items-center mb-2">
                                            <h3 class="font-medium">
                                                {{ $prescription->medication->Name ?? 'Error Med Not Found' }}
                                                @if($prescription->Dosage)
                                                    <span class="text-sm text-gray-400">{{ $prescription->Dosage }}</span>
                                                @endif
                                            </h3>
                                            @if($prescription->RefillsRemaining > 0)
                                                <span class="ml-2 px-2 py-1 bg-green-900 text-green-300 rounded-full text-xs">Active</span>
                                            @else
                                                <span class="ml-2 px-2 py-1 bg-red-900 text-red-300 rounded-full text-xs">Expired</span>
                                            @endif
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 text-sm text-gray-400">
                                            <p>Dr. {{ $prescription->doctor->LastName ?? 'Unknown Doctor' }}</p>
                                            <p>{{ $prescription->PrescriptionDate->format('M d, Y') }}</p>
                                            <p>Refills: {{ $prescription->RefillsRemaining }}/{{ $prescription->RefillsAllowed }}</p>
                                        </div>
                                    </div>
                                    @if($prescription->RefillsRemaining > 0)
                                        <button class="text-green-400 hover:text-green-300">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 text-center py-8">No prescription history found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
    @else
        <main class="flex-grow flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">Please Login</h1>
                <a href="{{ route('show.login') }}" class="px-6 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">
                    Login to View Prescriptions
                </a>
            </div>
        </main>
    @endauth
</body>
</html>

