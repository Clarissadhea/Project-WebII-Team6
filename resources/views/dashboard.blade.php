<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Admin Dashboard - IdolVerse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="w-64 bg-slate-900 min-h-screen text-slate-300 p-5">
        <h2 class="text-2xl font-bold text-white mb-8 text-pink-500">IdolVerse Admin</h2>
        <nav class="space-y-2">
            <a href="#" class="block bg-slate-800 text-white p-3 rounded-lg"><i class="fas fa-chart-pie mr-2"></i> Dashboard</a>
            <a href="/admin/idols/create" class="block p-3 hover:bg-slate-800 rounded-lg"><i class="fas fa-user-plus mr-2"></i> Add New Idol</a>
        </nav>
    </div>
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Overview</h1>
        <div class="grid grid-cols-2 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
                <div><p class="text-gray-400 text-sm">Total Idols</p><h3 class="text-2xl font-bold text-slate-800">42</h3></div>
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
                    <tr class="border-b border-gray-200 text-gray-400 text-sm uppercase"><th class="pb-3">Name</th><th class="pb-3">Group</th><th class="pb-3">Actions</th></tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-100">
                        <td class="py-3 font-medium text-gray-900">Jennie Kim</td>
                        <td class="py-3 text-gray-500">BLACKPINK</td>
                        <td class="py-3 flex gap-2">
                            <button class="bg-blue-50 text-blue-600 px-3 py-1 rounded"><i class="fas fa-edit"></i></button>
                            <button class="bg-red-50 text-red-600 px-3 py-1 rounded"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>