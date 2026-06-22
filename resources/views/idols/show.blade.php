<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Idol Profile - {{ $idol->nama_idol }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700;800&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>

    <body class="bg-[#FFF9E6] font-sans text-gray-800 min-h-screen"> <!-- Background Lemon Cream -->

        <nav class="bg-white border-b border-[#E5D1FA] sticky top-0 z-50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/idols" class="text-2xl font-extrabold tracking-wider text-[#D2386C]">
                        Idol<span class="text-gray-700">Verse</span>
                    </a>
                </div>

                <div class="flex items-center space-x-3">

                    @guest
                        <a href="/login"
                            class="text-gray-600 hover:text-[#D2386C] text-sm font-semibold px-3 py-2 transition">Login</a>
                        <a href="/register"
                            class="bg-[#D2386C] text-white text-sm font-bold px-4 py-2.5 rounded-xl shadow-md shadow-[#D2386C]/10 hover:bg-[#b82f5d] transition">Register</a>
                    @endguest

                    @auth
                        <span class="text-gray-600 text-sm font-semibold px-3 py-2 bg-[#FFF9E6] rounded-xl text-[#D2386C]">
                            Hi, {{ Auth::user()->name }}
                        </span>

                        @if(Auth::user()->role === 'admin')
                            <a href="/admin/dashboard"
                                class="text-xs bg-[#E5D1FA] text-purple-700 px-3 py-2.5 rounded-xl hover:bg-[#d8beee] font-bold transition">
                                <i class="fas fa-lock mr-1"></i> Admin Panel
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit"
                                class="text-red-500 hover:text-red-700 text-sm font-bold px-3 py-2.5 bg-red-50 hover:bg-red-100 rounded-xl transition">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <div
            class="bg-gradient-to-r from-[#E5D1FA] to-[#D0E7FF] text-gray-900 pt-28 pb-14 relative overflow-hidden shadow-inner">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#FFF9E6]/40 rounded-full blur-2xl"></div>

            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center sm:items-end space-y-4 sm:space-y-0 sm:space-x-8 relative z-10">

                <div
                    class="w-36 h-36 rounded-full overflow-hidden border-4 border-white bg-white shadow-xl flex-shrink-0 group transition duration-300 transform hover:scale-105">
                    @if($idol->foto)
                        <img src="{{ asset('storage/' . $idol->foto) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="w-full h-full object-cover">
                    @endif
                </div>

                <div class="text-center sm:text-left pb-2">
                    <span
                        class="text-xs font-black uppercase tracking-widest bg-[#D2386C] text-white px-3 py-1 rounded-full shadow-sm">
                        {{ $idol->grup }}
                    </span>
                    <h1 class="text-4xl font-black mt-2 tracking-tight text-gray-900">{{ $idol->nama_idol }}</h1>
                    <p
                        class="text-gray-700 font-medium text-sm mt-1 flex items-center justify-center sm:justify-start gap-1">
                        <i class="fas fa-star text-yellow-500 text-xs"></i> {{ $idol->deskripsi ?? 'Artist' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5D1FA]/60 h-fit relative overflow-hidden">
                <h2 class="text-lg font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                    <span class="w-2 h-5 bg-[#D2386C] rounded-full"></span> Biodata Facts
                </h2>

                <div class="space-y-4 text-sm">
                    <div class="bg-[#FFF9E6]/30 p-3 rounded-xl border border-gray-50">
                        <span class="text-[10px] text-gray-400 font-bold block uppercase tracking-wider">Stage
                            Name</span>
                        <span class="text-gray-900 font-bold text-base">{{ $idol->nama_idol }}</span>
                    </div>
                    <div class="bg-[#D0E7FF]/20 p-3 rounded-xl border border-gray-50">
                        <span class="text-[10px] text-gray-400 font-bold block uppercase tracking-wider">Group /
                            Agency</span>
                        <span class="text-blue-700 font-bold text-base">{{ $idol->grup }}</span>
                    </div>
                    <div class="bg-[#E5D1FA]/20 p-3 rounded-xl border border-gray-50">
                        <span class="text-[10px] text-gray-400 font-bold block uppercase tracking-wider">Description
                            Info</span>
                        <span
                            class="text-gray-700 font-medium block mt-1 leading-relaxed">{{ $idol->deskripsi ?? 'No description added.' }}</span>
                    </div>
                </div>

                <a href="/idols"
                    class="mt-6 flex items-center justify-center w-full bg-white border border-[#E5D1FA] text-gray-600 font-bold py-3 rounded-2xl hover:bg-[#FFF9E6] hover:text-[#D2386C] transition shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
            </div>

            <div class="lg:col-span-2 space-y-6">

                @if(session('success'))
                    <div
                        class="p-4 mb-4 text-sm font-semibold text-green-700 bg-green-50 border-l-4 border-green-500 rounded-xl shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5D1FA]/60">
                    <h2 class="text-lg font-extrabold text-gray-900 mb-5 flex items-center justify-between">
                        <span><i class="far fa-comments text-[#D2386C] mr-2 text-xl"></i>Fan Discussions</span>
                        <span
                            class="text-xs bg-gray-100 text-gray-500 font-bold px-2.5 py-1 rounded-full">{{ $comments->count() }}
                            Comments</span>
                    </h2>

                    @auth
                        <form action="{{ route('idols.comment.store', $idol->id) }}" method="POST"
                            class="space-y-3 mb-6 bg-[#FFF9E6]/20 p-4 rounded-2xl border border-[#E5D1FA]/40">
                            @csrf
                            <textarea name="isi_komentar" rows="3"
                                class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none text-sm transition bg-white"
                                placeholder="Write a supportive comment for {{ $idol->nama_idol }}..." required></textarea>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-[#D2386C] hover:bg-[#b82f5d] text-white font-bold text-sm px-5 py-2.5 rounded-xl shadow-md shadow-[#D2386C]/10 transition">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    @else

                        <div class="bg-[#FFF9E6]/60 border border-[#E5D1FA] rounded-2xl p-6 text-center mb-6">
                            <p class="text-gray-600 text-sm font-medium mb-3">Ingin ikut berdiskusi dan memberikan dukungan
                                tentang {{ $idol->nama_idol }}?</p>
                            <a href="/login"
                                class="inline-block bg-[#D2386C] text-white font-bold text-sm px-6 py-2.5 rounded-xl hover:bg-[#b82f5d] shadow-md shadow-[#D2386C]/10 transition">Login
                                Sekarang</a>
                        </div>
                    @endauth

                    <div class="space-y-4">
                        @forelse($comments as $comment)
                            <div
                                class="bg-white p-4 rounded-2xl border border-gray-100 flex space-x-3 transition hover:shadow-sm hover:border-[#E5D1FA]/60">

                                <div
                                    class="w-9 h-9 rounded-full bg-[#E5D1FA] text-purple-700 flex items-center justify-center font-black text-sm shadow-sm flex-shrink-0 uppercase">
                                    {{ substr($comment->user->name ?? 'A', 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span
                                                class="font-extrabold text-xs text-gray-900">{{ $comment->user->name ?? 'Anonymous Fan' }}</span>
                                            <span class="text-[10px] text-gray-400 font-semibold ml-2"><i
                                                    class="far fa-clock mr-0.5"></i>
                                                {{ $comment->created_at->diffForHumans() }}</span>
                                        </div>

                                        @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $comment->user_id))
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                                class="m-0 p-0 inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-red-500 text-[11px] font-bold uppercase tracking-wider transition flex items-center gap-1"
                                                    onclick="return confirm('Yakin hapus komentar ini?')">
                                                    <i class="fas fa-trash-alt text-xs"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <p class="text-gray-700 text-sm mt-1.5 leading-relaxed">{{ $comment->isi_komentar }}</p>
                                </div>
                            </div>
                        @empty

                            <div
                                class="text-center text-gray-400 py-10 border-2 border-dashed border-gray-100 rounded-2xl bg-gray-50/50">
                                <i class="far fa-comment-dots text-4xl mb-3 text-gray-300 block"></i>
                                <p class="text-sm font-medium">Belum ada diskusi. Yuk, jadi yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

    </body>

</html>