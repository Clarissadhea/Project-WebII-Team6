<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-600 to-pink-500 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-2">Welcome Back</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Login to interact with your ultimate bias</p>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Email Address</label>
                <input type="email" name="email" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none" required>
            </div>
            <div class="mb-6">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none" required>
            </div>
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold p-3 rounded-xl transition-colors shadow">Sign In</button>
        </form>
        <p class="text-sm text-center text-gray-500 mt-6">Don't have an account? <a href="/register" class="text-pink-600 font-semibold hover:underline">Register</a></p>
    </div>
</body>
</html>