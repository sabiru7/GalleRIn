<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $post = Post::create($data);

        // redirect ke daftar atau halaman post; contoh ke index:
        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat.');
    }

    // (opsional) index method untuk redirect target
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }
}
