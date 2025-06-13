<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
        $this->middleware('admin')->except(['index','show']);
    }

    public function index()
    {
        $beritas = Berita::with('user')->latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:10',
            'konten' => 'required',
            'foto' => 'required|image',
        ]);

        $path = $request->file('foto')->store('berita','public');

        Berita::create([
            ...$validated,
            'foto' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('berita.index')->with('success','Berita ditambahkan');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|min:10',
            'konten' => 'required',
            'foto' => 'nullable|image',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('berita','public');
            $validated['foto'] = $path;
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success','Berita diupdate');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return back()->with('success','Berita dihapus');
    }
}
