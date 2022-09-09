<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:gallery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $gallery = Gallery::all();

        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_gallery' => 'required|string',
            'caption_gallery' => 'required|string|max:255',
            'foto_gallery' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('foto_gallery');
        $foto_gallery = $image->storeAs('public/foto_gallery', $image->hashName());

        Gallery::create([
            'judul_gallery' => $request->judul_gallery,
            'caption_gallery' => $request->caption_gallery,
            'foto_gallery' => $foto_gallery
        ]);

        return redirect()->route('gallery.index')
            ->with('success_message', 'Berhasil menambahkan gallery baru');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success_message', 'Berhasil menghapus gallery');
    }
}
