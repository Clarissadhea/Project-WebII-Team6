<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#D0E7FF] min-h-screen flex items-center justify-center p-4"

    <!-- KOTAK FORM (CARD MODERN) -->
    <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl w-full max-w-md border border-[#E5D1FA]/50 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#E5D1FA]/40 rounded-full blur-2xl"></div>

        <div class="text-center mb-6 relative z-10">
            <h2 class="text-3xl font-extrabold text-gray-900">Join IdolVerse</h2>
            <p class="text-sm text-gray-400 font-medium mt-1">Create an account to join fan discussions</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl text-sm relative z-10">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-5 relative z-10">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Username</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Password</label>
                <input type="password" name="password" 
                    class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" required>
            </div>

            <button type="submit" 
                class="w-full bg-[#D2386C] hover:bg-[#b82f5d] text-white font-bold p-3.5 rounded-xl transition shadow-lg shadow-[#D2386C]/20 mt-2">
                Register Account
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-6 relative z-10">
            Already have an account? 
            <a href="/login" class="text-[#D2386C] font-semibold hover:underline">Log In</a>
        </p>
    </div>
    
</body>
</html>