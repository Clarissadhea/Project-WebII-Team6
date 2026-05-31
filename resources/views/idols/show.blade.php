<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idol Profile - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <!-- Navbar Utama -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="/idols" class="text-2xl font-bold text-pink-600">IdolVerse</a>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/idols" class="text-gray-600 hover:text-purple-600 text-sm font-medium px-3 py-2"><i class="fas fa-home mr-1"></i> Home</a>
                <a href="/admin/dashboard" class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded hover:bg-gray-200"><i class="fas fa-lock"></i> Admin Panel</a>
            </div>
        </div>
    </nav>

    <!-- Profile Header & Cover Section -->
    <div class="relative bg-white border-b border-gray-200">
        <!-- Cover Image -->
        <div class="h-48 md:h-64 bg-gradient-to-r from-purple-600 to-pink-500"></div>

        <!-- Profile Info Wrapper -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6">
            <div class="relative -mt-24 sm:-mt-32 sm:flex sm:items-end sm:space-x-5">
                <!-- Avatar Idol -->
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white overflow-hidden bg-white shadow">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="w-full h-full object-cover">
                </div>
                <!-- Nama & Grup -->
                <div class="mt-4 sm:mt-0 flex-1 min-w-0">
                    <p class="text-sm font-semibold text-purple-600 tracking-wide uppercase">BLACKPINK</p>
                    <h1 class="text-3xl font-bold text-gray-900 truncate">Jennie Kim</h1>
                    <p class="text-sm text-gray-500 mt-1">Main Rapper, Lead Vocalist</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Detail & Kolom Komentar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Kolom Kiri: Biodata Lengkap (FR-05) -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 mb-4">Biodata Facts</h2>
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-gray-400 block text-xs uppercase font-semibold">Stage Name</span>
                        <span class="text-gray-800 font-medium">Jennie (제니)</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block text-xs uppercase font-semibold">Birth Name</span>
                        <span class="text-gray-800 font-medium">Kim Jennie (김제니)</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block text-xs uppercase font-semibold">Birthplace</span>
                        <span class="text-gray-800 font-medium">Cheongdam-dong, Seoul, South Korea</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block text-xs uppercase font-semibold">Zodiac Sign</span>
                        <span class="text-gray-800 font-medium">Capricorn</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Kolom Komentar Penggemar (FR-06) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4"><i class="far fa-comments text-pink-500 mr-2"></i> Fan Discussions</h2>
                
                <!-- Input Form Kirim Komentar -->
                <form class="mb-6">
                    <div class="w-full mb-4 border border-gray-200 rounded-xl bg-gray-50 focus-within:ring-2 focus-within:ring-purple-500/20 focus-within:border-purple-500 overflow-hidden">
                        <div class="px-4 py-2 bg-white rounded-t-xl">
                            <textarea rows="3" class="w-full px-0 text-sm text-gray-900 bg-white border-0 outline-none resize-none" placeholder="Write a supportive comment..." required></textarea>
                        </div>
                        <div class="flex items-center justify-end px-3 py-2 border-t border-gray-200 bg-gray-50">
                            <button type="submit" class="inline-flex items-center py-2 px-4 text-xs font-medium text-center text-white bg-purple-600 rounded-lg hover:bg-purple-700 shadow-sm">
                                Post Comment
                            </button>
                        </div>
                    </div>
                </form>

                <!-- List Komentar Fans (Mockup Data) -->
                <div class="space-y-4">
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-7 h-7 bg-pink-100 rounded-full flex items-center justify-center text-xs font-bold text-pink-600">N</div>
                                <span class="text-sm font-semibold text-gray-900">Nazwa Amanda</span>
                            </div>
                            <span class="text-xs text-gray-400">Just now</span>
                        </div>
                        <p class="text-sm text-gray-600 pl-9">Jennie solo comeback is literally insane! Can't stop streaming the MV! 💖✨</p>
                    </div>

                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-7 h-7 bg-purple-100 rounded-full flex items-center justify-center text-xs font-bold text-purple-600">D</div>
                                <span class="text-sm font-semibold text-gray-900">Dhea</span>
                            </div>
                            <span class="text-xs text-gray-400">2 hours ago</span>
                        </div>
                        <p class="text-sm text-gray-600 pl-9">Human Chanel indeed! Her outfit choices are always on point.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>