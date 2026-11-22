@extends('layouts.app')
@section('judul', 'Detail Buku')

@section('konten')
  <h3>Detail Buku: {{ $buku->judul }}</h3>
  
  <ul>
      <li><strong>Kode Buku:</strong> {{ $buku->kode_buku }}</li>
      <li><strong>Judul:</strong> {{ $buku->judul }}</li>
      <li><strong>Penulis:</strong> {{ $buku->penulis }}</li>
      <li>
          <strong>Stok:</strong> 
          @if ($buku->stok == 0)
              <span style="color: red; font-weight: bold;">0 (Habis)</span>
          @else
              {{ $buku->stok }}
          @endif
      </li>
      <li><strong>Kategori:</strong> {{ $buku->kategori }}</li>
  </ul>

  <br>
  <a href="{{ route('buku.index') }}">Kembali ke Daftar Buku</a>
@endsection