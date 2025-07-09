<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostGetController extends Controller
{
    public function __invoke(Request $request, $post)
{
    $path = Storage::disk('public')->path("posts/$post");

    if (!file_exists($path) || is_dir($path)) {
        abort(404, 'File not found.');
    }

    return response()->download($path, $post, [
        'Content-Type' => mime_content_type($path),
    ]);
}

}
