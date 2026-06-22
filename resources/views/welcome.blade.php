<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IdolVerse - Explore Your Favorite Idols</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>

    <body class="bg-[#FFF9E6] text-gray-800 min-h-screen flex flex-col justify-between">

        <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-[#E5D1FA] px-6 py-4 shadow-sm">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/" class="text-2xl font-bold tracking-wider text-[#D2386C]">
                    Idol<span class="text-gray-700">Verse</span>
                </a>

                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <span
                                class="text-xs bg-purple-100 text-purple-700 font-bold px-3 py-2 rounded-full uppercase tracking-wider hidden sm:inline-block">
                                👤 {{ Auth::user()->name }}
                            </span>

                    @if(Auth::check() && Auth::user()->name === 'Admin Team 6')
                        <a href="/admin/dashboard" class="text-sm font-bold text-blue-700 bg-[#D0E7FF] hover:bg-[#b9daff] transition px-4 py-2 rounded-full shadow-sm">
                            Admin Panel
                        </a> 
                    @endif

                            <form action="{{ route('logout') }}" method="POST" class="inline m-0 p-0">
                                @csrf
                                <button type="submit"
                                    class="text-sm font-bold text-red-600 bg-red-50 hover:bg-red-100 transition px-4 py-2 rounded-full cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-semibold text-gray-600 hover:text-[#D2386C] transition px-4 py-2">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-sm font-semibold text-white bg-[#D2386C] hover:bg-[#b82f5d] shadow-md shadow-[#D2386C]/20 transition px-5 py-2.5 rounded-full">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <header class="max-w-7xl mx-auto w-full px-6 pt-8 pb-4">
            <div
                class="bg-gradient-to-r from-[#E5D1FA] via-[#D0E7FF] to-[#FFF9E6] rounded-3xl p-8 md:p-16 text-center shadow-inner relative overflow-hidden">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#D2386C]/10 rounded-full blur-2xl"></div>

                <h1
                    class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight max-w-3xl mx-auto">
                    Explore Your <span class="text-[#D2386C]">Favorite Idols</span>
                </h1>
                <p class="mt-4 text-base md:text-lg text-gray-600 font-medium max-w-xl mx-auto">
                    Encyclopedia and community discussions for K-Pop & J-Pop fans around the universe.
                </p>

                <form action="/" method="GET" class="mt-8 max-w-md mx-auto bg-white p-2 rounded-full shadow-xl flex items-center border border-[#E5D1FA]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search your beloved idol..."
                        class="w-full pl-4 pr-2 py-2 text-sm bg-transparent focus:outline-none text-gray-700">
                    <button type="submit"
                        class="bg-[#D2386C] hover:bg-[#b82f5d] text-white px-5 py-2 text-sm font-semibold rounded-full transition shadow-md shadow-[#D2386C]/10">
                        Search
                    </button>
                </form>
            </div>
        </header>

        <main class="max-w-7xl mx-auto w-full px-6 py-12 flex-grow">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <span class="w-2.5 h-6 bg-[#D2386C] rounded-full inline-block"></span>
                    Featured Idols
                </h2>
                <span class="text-xs font-semibold bg-[#D0E7FF] text-blue-700 px-3 py-1.5 rounded-full">🔥 Updated
                    Today</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($idols ?? [] as $idol)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 border border-[#E5D1FA]/40 flex flex-col justify-between">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $idol->foto) }}" alt="{{ $idol->nama_idol }}"
                                class="w-full h-56 object-cover bg-gray-100"
                                onerror="this.src='https://placehold.co/400x300?text=No+Image'">
                            <span
                                class="absolute top-3 right-3 bg-[#D2386C] text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                {{ $idol->grup ?? 'Soloist' }}
                            </span>
                        </div>

                        <div class="p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 hover:text-[#D2386C] transition">
                                    {{ $idol->nama_idol }}</h3>
                                <p class="text-xs text-gray-400 font-medium mt-0.5">Performer</p>
                                <p class="text-sm text-gray-600 mt-3 line-clamp-2 leading-relaxed">
                                    {{ $idol->deskripsi ?? 'No description available.' }}</p>
                            </div>

                            <div class="mt-5 pt-4 border-t border-gray-50 flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-500 flex items-center gap-1">
                                    💬 {{ $idol->comments_count ?? 0 }} Comments
                                </span>
                                <a href="{{ url('/idols/' . $idol->id) }}"
                                    class="text-xs font-bold text-[#D2386C] hover:underline bg-[#E5D1FA]/30 px-3 py-1.5 rounded-lg transition">
                                    View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-dashed border-[#E5D1FA]">
                        <p class="text-gray-500 font-medium">Belum ada data idol di database.</p>
                    </div>
                @endforelse
            </div>
        </main>

        <footer class="bg-white border-t border-[#E5D1FA] py-6 text-center text-xs text-gray-500 font-medium">
            <p>© 2026 IdolVerse Kelompok 6. All rights reserved.</p>
        </footer>

    </body>

</html>