<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-gray-800 text-gray-400">
            <div class="p-4">
                <h1 class="text-xl font-bold text-white">Admin Panel</h1>
            </div>

            <nav class="mt-6">
                <div class="px-4 py-3 bg-gray-700 text-white rounded-md mx-3 flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </div>

                @foreach([
                    ['Users', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['Products', 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
                    ['Orders', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['Settings', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
                    ['Reports', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z']
                ] as [$title, $path])
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-700 hover:text-white rounded-md mx-2 mt-1">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"></path>
                    </svg>
                    {{ $title }}
                </a>
                @endforeach


                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button href="{{ url('/logout') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 hover:text-white rounded-md mx-2 mt-8 text-red-400">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>


            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-semibold">Dashboard Overview</h1>

                <div class="flex items-center">
                    <div class="relative mr-4">
                        <input type="text" placeholder="Search..." class="bg-gray-800 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <div class="relative">
                        <button class="flex items-center bg-gray-800 rounded-lg px-4 py-2 focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name=Admin+User" class="w-6 h-6 rounded-full mr-2" alt="User">
                            <span>Admin</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @foreach([
                    ['Users', '12,345', 'bg-gradient-to-r from-blue-500 to-blue-600', 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', '12%'],
                    ['Revenue', '$34,567', 'bg-gradient-to-r from-green-500 to-green-600', 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', '8%'],
                    ['Orders', '1,234', 'bg-gradient-to-r from-purple-500 to-purple-600', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', '23%'],
                    ['Conversion', '5.67%', 'bg-gradient-to-r from-red-500 to-red-600', 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', '-3%']
                ] as [$title, $value, $bgClass, $path, $change])
                <div class="rounded-lg shadow {{ $bgClass }}">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-gray-100 text-sm">{{ $title }}</h2>
                            <div class="rounded-full bg-white bg-opacity-30 p-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-3xl font-bold text-white">{{ $value }}</h3>
                            <p class="mt-2 text-white text-opacity-80 text-sm">
                                @if(str_starts_with($change, '-'))
                                    <span class="text-red-200">{{ $change }}</span>
                                @else
                                    <span class="text-green-200">+{{ $change }}</span>
                                @endif
                                since last month
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Recent Activity & Users -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activity -->
                <div class="bg-gray-800 rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Recent Activity</h2>
                        <button class="text-sm text-blue-400 hover:text-blue-300">View All</button>
                    </div>
                    <div class="space-y-4">
                        @foreach(['New user registration', 'Product update', 'Order completed', 'Payment received', 'Content update'] as $index => $activity)
                        <div class="flex items-start">
                            <div class="rounded-full bg-gray-700 p-2 mr-4">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-200">{{ $activity }}</p>
                                <p class="text-sm text-gray-400">{{ 60 - $index * 12 }} minutes ago</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Users -->
                <div class="bg-gray-800 rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Recent Users</h2>
                        <button class="text-sm text-blue-400 hover:text-blue-300">View All</button>
                    </div>
                    <div class="space-y-4">
                        @foreach($users as $user)
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $user->name) }}"
                                 class="w-10 h-10 rounded-full mr-4"
                                 alt="{{ $user->name }}">
                            <div>
                                <p class="text-gray-200">{{ $user->name }}</p>
                                <p class="text-sm text-gray-400">{{ strtolower(str_replace(' ', '.', $user->name)) }}@example.com</p>
                            </div>
                            <div class="ml-auto">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-500 bg-opacity-20 text-green-400">Active</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
