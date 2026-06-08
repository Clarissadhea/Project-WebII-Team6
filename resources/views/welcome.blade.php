<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdolVerse - Home</title>
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
                <a href="/login" class="text-gray-600 hover:text-purple-600 text-sm font-medium px-3 py-2">Login</a>
                <a href="/register" class="bg-purple-600 text-white text-sm font-medium px-4 py-2 rounded-lg shadow hover:bg-purple-700">Register</a>
                <a href="/admin/dashboard" class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded hover:bg-gray-200"><i class="fas fa-lock"></i> Admin Panel</a>
            </div>
        </div>
    </nav>

    <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white py-12 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight">Explore Your Favorite Idols</h1>
        <p class="mt-2 text-purple-100 max-w-md mx-auto">Encyclopedia and community discussions for K-Pop & J-Pop fans.</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Featured Idols</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($idols as $idol)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                <div class="h-48 overflow-hidden relative">
                    
                    @if($idol->foto)
                        <img src="{{ asset('storage/' . $idol->foto) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="w-full h-full object-cover">
                    @endif

                    <span class="absolute top-3 right-3 bg-pink-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                        {{ $idol->grup }}
                    </span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900">{{ $idol->nama_idol }}</h3>
                    <p class="text-gray-500 text-sm">{{ $idol->deskripsi ?? 'Artist' }}</p>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="text-xs text-purple-600 font-medium">
                            <i class="fas fa-comments mr-1"></i> {{ $idol->comments_count ?? 0 }} Comments
                        </span>
                        
                        <a href="/idols/{{ $idol->id }}" class="bg-purple-50 text-purple-600 hover:bg-purple-100 text-xs font-semibold px-4 py-2 rounded-lg transition-colors">
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 bg-white rounded-xl border border-gray-100">
                <p class="text-gray-400 text-sm">Belum ada data idol di database. Silakan tambahkan melalui Admin Panel!</p>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>
