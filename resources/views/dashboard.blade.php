<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="w-64 bg-slate-900 min-h-screen text-slate-300 p-5">
        <h2 class="text-2xl font-bold text-white mb-8 text-pink-500">IdolVerse Admin</h2>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block bg-slate-800 text-white p-3 rounded-lg"><i class="fas fa-chart-pie mr-2"></i> Dashboard</a>
            <a href="/admin/idols/create" class="block p-3 hover:bg-slate-800 rounded-lg"><i class="fas fa-user-plus mr-2"></i> Add New Idol</a>
            <a href="/" class="block p-3 hover:bg-slate-800 rounded-lg text-pink-400 hover:text-pink-300 border-t border-slate-800 mt-4 pt-4"><i class="fas fa-arrow-left mr-2"></i> Back to Home</a>
        </nav>
    </div>

    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Overview</h1>
        
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-2 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Total Idols</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $idols->count() }}</h3>
                </div>
                <div class="p-3 bg-purple-100 text-purple-600 rounded-xl"><i class="fas fa-users text-xl"></i></div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Manage Idols Data</h2>
                <a href="/admin/idols/create" class="bg-purple-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-purple-700"><i class="fas fa-plus mr-1"></i> Add Idol</a>
            </div>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-400 text-sm uppercase">
                        <th class="pb-3">Name</th>
                        <th class="pb-3">Group</th>
                        <th class="pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($idols as $idol)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 font-medium text-gray-900">{{ $idol->nama_idol }}</td>
                        <td class="py-3 text-gray-500">{{ $idol->grup }}</td>
                        <td class="py-3 flex gap-2 items-center">
                            <button class="bg-blue-50 text-blue-600 px-3 py-1 rounded hover:bg-blue-100" onclick="openEditModal({{ $idol->id }}, '{{ $idol->nama_idol }}', '{{ $idol->grup }}', '{{ $idol->deskripsi }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            
                            <form action="{{ route('admin.idols.destroy', $idol->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $idol->nama_idol }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 text-red-600 px-3 py-1 rounded hover:bg-red-100">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-400">Belum ada data idol di database.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Edit Data Idol</h2>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Idol</label>
                    <input type="text" name="nama_idol" id="edit_nama_idol" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Grup</label>
                    <input type="text" name="grup" id="edit_grup" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="3" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="w-full p-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Simpan Perubahan</button>
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