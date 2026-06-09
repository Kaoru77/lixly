<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        // Membuat query dasar mengambil Film
        $query = Movie::query();

        // Fitur 1: Jika user mengetik kolom pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Fitur 2: Jika user memilih filter genre
        if ($request->has('genre') && $request->genre != '') {
            $query->where('genre', $request->genre);
        }

        // Mengambil hasil akhirnya
        $movies = $query->get();

        return view('index', compact('movies'));
    }

    public function show(int $id)
    {
        $movie = Movie::findOrFail($id);
        return view('detail', compact('movie'));
    }
}