<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#FFF9E6] flex min-h-screen">

    <div class="w-64 bg-white border-r border-[#E5D1FA] text-gray-700 p-5 flex flex-col justify-between shadow-sm">
        <div>
            <h2 class="text-2xl font-extrabold tracking-wider text-[#D2386C] mb-8 px-2">
                Idol<span class="text-gray-700">Verse</span> <span class="text-xs bg-[#E5D1FA] text-purple-700 px-2 py-0.5 rounded-full font-bold ml-1">Admin</span>
            </h2>

            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center bg-[#D0E7FF] text-[#D2386C] font-semibold p-3 rounded-xl transition shadow-sm">
                    <i class="fas fa-chart-pie mr-3 text-lg"></i> Dashboard
                </a>
                <a href="/admin/idols/create" class="flex items-center p-3 hover:bg-[#FFF9E6] hover:text-[#D2386C] rounded-xl transition font-medium">
                    <i class="fas fa-user-plus mr-3 text-lg text-gray-400"></i> Add New Idol
                </a>
            </nav>
        </div>

        <div>
            <a href="/" class="flex items-center p-3 hover:bg-red-50 text-[#D2386C] font-bold border-t border-[#E5D1FA] pt-4 transition">
                <i class="fas fa-arrow-left mr-3"></i> Back to Home
            </a>
        </div>
    </div>

    <div class="flex-1 p-8 md:p-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Dashboard Overview</h1>

        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm font-medium text-sm">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E5D1FA]/60 flex items-center justify-between hover:shadow-md transition">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Idols</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $idols->count() }}</h3>
                </div>
                <div class="p-4 bg-[#E5D1FA]/50 text-[#D2386C] rounded-2xl">
                    <i class="fas fa-users text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-[#E5D1FA]/60 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <span class="w-2 h-5 bg-[#D2386C] rounded-full"></span> Manage Idols Data
                </h2>
                <a href="/admin/idols/create" class="bg-[#D2386C] text-white text-sm font-semibold px-4 py-2.5 rounded-xl hover:bg-[#b82f5d] transition shadow-md shadow-[#D2386C]/10 flex items-center gap-2">
                    <i class="fas fa-plus text-xs"></i> Add Idol
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#E5D1FA] text-gray-500 text-xs font-bold uppercase tracking-wider bg-[#D0E7FF]/20">
                            <th class="p-4 rounded-l-xl">Name</th>
                            <th class="p-4">Group</th>
                            <th class="p-4 rounded-r-xl text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse($idols as $idol)
                        <tr class="hover:bg-[#FFF9E6]/30 transition">
                            <td class="p-4 font-semibold text-gray-900">{{ $idol->nama_idol }}</td>
                            <td class="p-4 text-gray-600">
                                <span class="bg-[#D0E7FF] text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $idol->grup }}
                                </span>
                            </td>
                            <td class="p-4 flex gap-2 items-center justify-center">
                                <!-- Tombol Edit (Aksen Blueberry Milk) -->
                                <button type="button" class="bg-[#D0E7FF]/50 text-blue-700 p-2.5 rounded-xl hover:bg-[#D0E7FF] transition shadow-sm" 
                                    onclick="openEditModal({{ $idol->id }}, `{{ addslashes($idol->nama_idol) }}`, `{{ addslashes($idol->grup) }}`, `{{ addslashes($idol->deskripsi) }}`)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <form action="{{ route('admin.idols.destroy', $idol->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $idol->nama_idol }}?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 text-red-600 p-2.5 rounded-xl hover:bg-red-100 transition shadow-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-gray-400 font-medium border-dashed border-2 border-gray-100 rounded-xl">
                                <i class="fas fa-folder-open text-3xl mb-2 block text-gray-300"></i> Belum ada data idol di database.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center z-50 transition duration-300">
        <div class="bg-white rounded-3xl p-6 md:p-8 w-full max-w-md shadow-2xl border border-[#E5D1FA]/50 m-4 relative overflow-hidden animate-fade-in">
            <div class="absolute -top-10 -right-10 w-28 h-28 bg-[#E5D1FA]/40 rounded-full blur-xl"></div>

            <div class="flex justify-between items-center mb-6 relative z-10">
                <h2 class="text-xl font-extrabold text-gray-900">Edit Data Idol</h2>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 bg-gray-100 hover:bg-gray-200 w-8 h-8 rounded-full flex items-center justify-center transition">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4 relative z-10">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Nama Idol</label>
                    <input type="text" name="nama_idol" id="edit_nama_idol" class="w-full p-3 border border-gray-200 rounded-xl focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] focus:outline-none transition bg-[#FFF9E6]/10" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Grup</label>
                    <input type="text" name="grup" id="edit_grup" class="w-full p-3 border border-gray-200 rounded-xl focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] focus:outline-none transition bg-[#FFF9E6]/10" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="3" class="w-full p-3 border border-gray-200 rounded-xl focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] focus:outline-none transition bg-[#FFF9E6]/10"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="w-full p-1 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#D0E7FF]/50 file:text-[#D2386C] hover:file:bg-[#D0E7FF] transition cursor-pointer">
                </div>
                
                <div class="flex justify-end gap-2 pt-4 border-t border-gray-50">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-xl hover:bg-gray-200 font-semibold text-sm transition">Batal</button>
                    <button type="submit" class="bg-[#D2386C] hover:bg-[#b82f5d] text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition shadow-lg shadow-[#D2386C]/10">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, nama, grup, deskripsi) {
            document.getElementById('editForm').action = '/admin/idols/' + id;
            document.getElementById('edit_nama_idol').value = nama;
            document.getElementById('edit_grup').value = grup;
            document.getElementById('edit_deskripsi').value = deskripsi;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</body>
</html>