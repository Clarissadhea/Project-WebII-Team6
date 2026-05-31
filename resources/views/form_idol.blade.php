<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Manage Data - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Add / Edit Idol Information</h2>
        <form action="/admin/dashboard" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Idol Name</label>
                <input type="text" class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-purple-500/20 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                <input type="text" class="w-full border border-gray-200 rounded-xl p-3 text-sm" placeholder="e.g. Main Rapper">
            </div>
            <div class="pt-4 flex justify-end gap-3">
                <a href="/admin/dashboard" class="border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="bg-purple-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-purple-700">Save Data</button>
            </div>
        </form>
    </div>
</body>
</html>