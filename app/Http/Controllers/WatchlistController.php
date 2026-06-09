<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchlistController extends Controller
{
    public function index()
    {
        $movies = Movie::whereIn('id', function($query) {
            $query->select('movie_id')->from('wishlists');
        })->get();

        return view('watchlist', compact('movies'));
    }

    public function store($id)
    {
        $exists = DB::table('wishlists')->where('movie_id', $id)->exists();

        if (!$exists) {
            DB::table('wishlists')->insert([
                'movie_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Film berhasil ditambahkan ke Watchlist!');
        }

        return redirect()->back()->with('info', 'Film sudah ada di Watchlist kamu.');
    }
    public function destroy($id)
   {
    DB::table('wishlists')->where('movie_id', $id)->delete();

    return redirect()->back()->with('success', 'Film berhasil dihapus dari Watchlist!');
  }
}