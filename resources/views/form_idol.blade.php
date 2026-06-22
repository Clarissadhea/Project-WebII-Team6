<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Data - Admin</title>
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
<body class="bg-[#FFF9E6] p-4 md:p-8 min-h-screen flex items-center justify-center"> 

    <div class="w-full max-w-2xl bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-[#E5D1FA]/60 relative overflow-hidden">
        <div class="absolute -top-12 -left-12 w-36 h-36 bg-[#E5D1FA]/40 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -right-12 w-36 h-36 bg-[#D0E7FF]/50 rounded-full blur-2xl"></div>

        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 relative z-10 flex items-center gap-2">
            <span class="w-2.5 h-6 bg-[#D2386C] rounded-full inline-block"></span>
            Add New Idol Information
        </h2>

        <form action="{{ route('admin.idols.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
            @csrf 

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Idol Name</label>
                <input type="text" name="nama_idol" class="w-full border border-gray-200 rounded-xl p-3.5 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" placeholder="e.g. Jennie Kim" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Group / Agency</label>
                <input type="text" name="grup" class="w-full border border-gray-200 rounded-xl p-3.5 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" placeholder="e.g. BLACKPINK" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Position / Description</label>
                <input type="text" name="deskripsi" class="w-full border border-gray-200 rounded-xl p-3.5 text-sm focus:ring-4 focus:ring-[#D2386C]/10 focus:border-[#D2386C] outline-none transition bg-[#FFF9E6]/10" placeholder="e.g. Main Rapper, Lead Vocalist">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Idol Photo Profile</label>
                <div class="mt-1 flex justify-center px-6 pt-6 pb-6 border-2 border-[#E5D1FA] border-dashed rounded-2xl bg-[#FFF9E6]/5 hover:bg-[#FFF9E6]/20 transition relative">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-12 w-12 text-[#D2386C]/40" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-bold text-[#D2386C] hover:text-[#b82f5d] focus-within:outline-none transition">
                                <span>Upload a file</span>
                                <input id="foto" name="foto" type="file" accept="image/*" class="sr-only" required>
                            </label>
                            <p class="pl-1 text-gray-500">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-400">PNG, JPG, JPEG up to 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3 border-t border-gray-50">
                <a href="{{ route('admin.dashboard') }}" class="border border-gray-200 px-5 py-3 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="bg-[#D2386C] hover:bg-[#b82f5d] text-white px-6 py-3 rounded-xl text-sm font-semibold transition shadow-lg shadow-[#D2386C]/10">Save Data</button>
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