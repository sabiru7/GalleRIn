<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PinController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        if (!$request->hasFile('image')) {
            return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $path = $request->file('image')->store('pins', 'public');

        $pin = Pin::create([
            'user_id' => Auth::id(),
            'title' => $request->title ?? 'Untitled',
            'description' => $request->description ?? '',
            'image' => $path,
        ]);

        // Buat URL bisa diakses
        $pin->image_url = Storage::url($path);

        return response()->json(['success' => true, 'pin' => $pin]);
    }
}
