@extends('layouts.app')
@section('title', 'FLIXLY - Katalog Film Lokal')
@section('content')
    <section class="movie-section">
      <div class="section-header">
        @if(request('search'))
            <h2><i class="ti ti-search"></i> Hasil Pencarian: "{{ request('search') }}"</h2>
            <a href="{{ route('movie.index') }}" class="clear-btn" style="text-decoration: none;"><i class="ti ti-x"></i> Hapus Pencarian</a>
        @elseif(request('genre'))
            <h2><i class="ti ti-filter"></i> Genre: {{ request('genre') }}</h2>
            <a href="{{ route('movie.index') }}" class="clear-btn" style="text-decoration: none;"><i class="ti ti-x"></i> Hapus Filter</a>
        @else
            <h2><i class="ti ti-flame"></i> Daftar-Daftar Movies</h2>
        @endif
      </div>
      
      <div class="movie-grid">
         @forelse($movies as $movie)
             <div class="movie-card">
                 <a href="{{ route('movie.show', $movie->id) }}" style="text-decoration: none; color: inherit;">
                     
                     <div class="card-poster">
                         <img src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">
                         <div class="poster-rating">★ {{ number_format($movie->rating, 1) }}</div>
                     </div>
                     
                     <div class="card-title">{{ $movie->title }}</div>
                     <div class="card-year">{{ $movie->release_date }}</div>
                     
                 </a>
             </div>
         @empty
             <p style="grid-column: 1/-1; text-align: center; color: var(--muted); padding: 3rem 0;">
                 Film tidak ditemukan di database lokal.
             </p>
         @endforelse
      </div>
    </section>
@endsection