<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Data - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Idol Information</h2>
        
        <form action="{{ route('admin.idols.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Idol Name</label>
                <input type="text" name="nama_idol" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none" placeholder="e.g. Jennie Kim" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Group / Agency</label>
                <input type="text" name="grup" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none" placeholder="e.g. BLACKPINK" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Position / Description</label>
                <input type="text" name="deskripsi" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none" placeholder="e.g. Main Rapper, Lead Vocalist">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Idol Photo Profile</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition relative">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none">
                                <span>Upload a file</span>
                                <input id="foto" name="foto" type="file" accept="image/*" class="sr-only" required>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-400">PNG, JPG, JPEG up to 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="bg-purple-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-purple-700 transition">Save Data</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('foto').addEventListener('change', function(e) {
            if(e.target.files.length > 0) {
                let fileName = e.target.files[0].name;
                e.target.closest('div').querySelector('p').innerText = "Selected: " + fileName;
            }
        });
    </script>
</body>
</html>