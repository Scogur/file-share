<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'file' => 'required',
        ]);

        $data['slug'] = str($data['title'])->slug();

        if ($request->hasFile('file')){
            $data['file'] = Storage::disk('public')->put('posts', $request->file('file'));
        }

        $request->user()->posts()->create($data);
        return to_route('posts.index')->with('success', 'Post created succesfully');
    }
}
