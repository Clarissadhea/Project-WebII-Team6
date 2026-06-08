<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idol;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class IdolController extends Controller
{
    public function index()
    {
        $idols = Idol::withCount('comments')->get();
        
        if (request()->is('admin/*')) {
            return view('dashboard', compact('idols'));
        }
        
        return view('welcome', compact('idols'));
    }

    public function create()
    {
        return view('form_idol');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_idol' => 'required|string|max:255',
            'grup' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $input['foto'] = $request->file('foto')->store('idols', 'public');
        }

        Idol::create($input);

        return redirect()->route('admin.dashboard')->with('success', 'Idol berhasil ditambahkan!');
    }

    public function show($id)
    {
        $idol = Idol::findOrFail($id);
        $comments = Comment::where('idol_id', $id)->with('user')->latest()->get();

        return view('idols.show', compact('idol', 'comments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_idol' => 'required|string|max:255',
            'grup' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $idol = Idol::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($idol->foto && Storage::disk('public')->exists($idol->foto)) {
                Storage::disk('public')->delete($idol->foto);
            }
            $input['foto'] = $request->file('foto')->store('idols', 'public');
        }

        $idol->update($input);

        return redirect()->route('admin.dashboard')->with('success', 'Data Idol berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $idol = Idol::findOrFail($id);

        if ($idol->foto && Storage::disk('public')->exists($idol->foto)) {
            Storage::disk('public')->delete($idol->foto);
        }

        $idol->delete();

        return redirect()->back()->with('success', 'Data Idol berhasil dihapus permanen!');
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
        ]);

        Comment::create([
            'idol_id' => $id,
            'user_id' => Auth::check() ? Auth::id() : null,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar Anda berhasil dikirim!');
    }
}