<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idol Profile - {{ $idol->nama_idol }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="/idols" class="text-2xl font-bold text-pink-600">IdolVerse</a>
            </div>
            <div class="flex items-center space-x-3">
                @guest
                    <a href="/login" class="text-gray-600 hover:text-purple-600 text-sm font-medium px-3 py-2">Login</a>
                    <a href="/register" class="bg-purple-600 text-white text-sm font-medium px-4 py-2 rounded-lg shadow hover:bg-purple-700">Register</a>
                @endguest

                @auth
                    <span class="text-gray-600 text-sm font-medium px-3 py-2">Hi, {{ Auth::user()->name }}</span>
                    
                    @if(Auth::user()->role === 'admin')
                        <a href="/admin/dashboard" class="text-xs bg-pink-100 text-pink-600 px-3 py-2 rounded-lg hover:bg-pink-200 font-bold"><i class="fas fa-lock"></i> Admin Panel</a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium px-3 py-2 bg-red-50 hover:bg-red-100 rounded-lg transition">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white pt-24 pb-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center sm:items-end space-y-4 sm:space-y-0 sm:space-x-6">
            
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white bg-white shadow-md flex-shrink-0">
                @if($idol->foto)
                    <img src="{{ asset('storage/' . $idol->foto) }}" class="w-full h-full object-cover">
                @else
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="w-full h-full object-cover">
                @endif
            </div>
            
            <div class="text-center sm:text-left pb-2">
                <span class="text-xs font-bold uppercase tracking-wider bg-purple-700 bg-opacity-40 px-2.5 py-1 rounded-full">
                    {{ $idol->grup }}
                </span>
                <h1 class="text-3xl font-extrabold mt-1">{{ $idol->nama_idol }}</h1>
                <p class="text-purple-100 text-sm mt-1">{{ $idol->deskripsi ?? 'Artist' }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-fit">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Biodata Facts</h2>
            <div class="space-y-4 text-sm">
                <div>
                    <span class="text-xs text-gray-400 font-semibold block uppercase">Stage Name</span>
                    <span class="text-gray-800 font-medium">{{ $idol->nama_idol }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-400 font-semibold block uppercase">Group / Agency</span>
                    <span class="text-gray-800 font-medium">{{ $idol->grup }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-400 font-semibold block uppercase">Description Info</span>
                    <span class="text-gray-800 font-medium">{{ $idol->deskripsi ?? 'No description added.' }}</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-bold text-gray-900 mb-4"><i class="far fa-comments text-purple-600 mr-2"></i>Fan Discussions</h2>
                
                @auth
                    <form action="{{ route('idols.comment.store', $idol->id) }}" method="POST" class="space-y-3">
                        @csrf
                        <textarea name="isi_komentar" rows="3" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 text-sm" placeholder="Write a supportive comment..." required></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-medium text-sm px-5 py-2 rounded-lg shadow transition-colors">
                                Post Comment
                            </button>
                        </div>
                    </form>
                @else
                    <div class="bg-purple-50 border border-purple-100 rounded-lg p-6 text-center">
                        <p class="text-gray-600 text-sm mb-3">Ingin ikut berdiskusi tentang {{ $idol->nama_idol }}?</p>
                        <a href="/login" class="inline-block bg-purple-600 text-white font-semibold text-sm px-5 py-2 rounded-lg hover:bg-purple-700 transition-colors">Login Sekarang</a>
                    </div>
                @endauth

                <div class="mt-8 space-y-4">
                    @forelse($comments as $comment)
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 flex space-x-3">
                        <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs uppercase">
                            {{ substr($comment->user->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-bold text-xs text-gray-900">{{ $comment->user->name ?? 'Anonymous Fan' }}</span>
                                    <span class="text-[10px] text-gray-400 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                
                                @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $comment->user_id))
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-[10px] font-bold uppercase tracking-wider transition-colors" onclick="return confirm('Yakin hapus komentar ini?')">
                                            <i class="fas fa-trash mr-1"></i>Hapus
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <p class="text-gray-600 text-sm mt-1">{{ $comment->isi_komentar }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-sm text-gray-400 py-6">Belum ada diskusi. Yuk, jadi yang pertama berkomentar!</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</body>
</html>