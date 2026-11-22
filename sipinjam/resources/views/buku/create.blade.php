@extends('layouts.app')
@section('judul', 'Tambah Buku Baru')

@section('konten')
  <h3>Tambah Buku Baru</h3>

  {{-- Menampilkan Pesan Error Validasi --}}
  @if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form action="{{ route('buku.store') }}" method="POST">
      @csrf
      
      <div>
          <label>Kode Buku:</label><br>
          <input type="text" name="kode_buku" value="{{ old('kode_buku') }}">
      </div>
      <br>
      <div>
          <label>Judul Buku:</label><br>
          <input type="text" name="judul" value="{{ old('judul') }}">
      </div>
      <br>
      <div>
          <label>Penulis:</label><br>
          <input type="text" name="penulis" value="{{ old('penulis') }}">
      </div>
      <br>
      <div>
          <label>Stok:</label><br>
          <input type="number" name="stok" value="{{ old('stok', 0) }}">
      </div>
      <br>
      <div>
          <label>Kategori:</label><br>
          <input type="text" name="kategori" value="{{ old('kategori') }}">
      </div>
      <br>
      
      <button type="submit">Simpan</button>
      <a href="{{ route('buku.index') }}">Batal</a>
  </form>
@endsection