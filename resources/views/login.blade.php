<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - Login</title>
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
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
                <a href="{{ url('/') }}" class="text-xl font-bold text-white">MediCare</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-gray-800 p-8 rounded-xl shadow-2xl w-full max-w-md fade-in border border-gray-700">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-green-400 mb-2">Welcome</h1>
                <p class="text-gray-400">Please sign in to your account</p>
            </div>

            <form action="{{ url('/login') }}" method="POST" class="space-y-6 slide-up">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                        <input id="email" name="email" type="email" 
                            class="bg-gray-700 text-white block w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-600 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out"
                            placeholder="you@example.com" required autofocus>
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <a href="{{ url('/forgot-password') }}" class="text-sm text-green-400 hover:text-green-300">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500"></i>
                        </div>
                        <input id="password" name="password" type="password"
                            class="bg-gray-700 text-white block w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-600 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out"
                            placeholder="••••••••" required>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" 
                        class="h-4 w-4 text-green-500 border-gray-600 rounded bg-gray-700 focus:ring-green-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                        Sign in
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-grow border-t border-gray-600"></div>
                <span class="px-4 text-sm text-gray-400">Or continue with</span>
                <div class="flex-grow border-t border-gray-600"></div>
            </div>

            <!-- Social Logins -->
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ url('/auth/google') }}" 
                    class="flex items-center justify-center px-4 py-2 border border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 transition duration-150">
                    <i class="fab fa-google text-lg mr-2"></i>
                    Google
                </a>
                <a href="{{ url('/auth/facebook') }}" 
                    class="flex items-center justify-center px-4 py-2 border border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 transition duration-150">
                    <i class="fab fa-facebook-f text-lg mr-2"></i>
                    Facebook
                </a>
            </div>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center text-sm">
                <span class="text-gray-400">Don't have an account?</span>
                <a href="{{ url('/register') }}" class="font-medium text-green-400 hover:text-green-300"> Sign up</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 mt-auto">
        <div class="container mx-auto px-4 text-center text-gray-400 text-sm">
            &copy; 2025 MediCare. All rights reserved.
        </div>
    </footer>
</body>
</html>
