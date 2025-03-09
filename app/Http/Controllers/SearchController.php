<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in multiple models
        $users = User::where('name', 'like', "%{$query}%")->get();
        $posts = Post::where('title', 'like', "%{$query}%")->get();

        // Combine results
        $results = [
            'users' => $users,
            'posts' => $posts,

        ];

        // Return the view with results
        return view('search_results', compact('results'));
    }

}
