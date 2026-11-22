@extends('layouts.app')
@section('judul', 'Ubah Data Buku')

@section('konten')
  <h3>Ubah Data Buku</h3>

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

  <form action="{{ route('buku.update', $buku->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div>
          <label>Kode Buku:</label><br>
          <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}">
      </div>
      <br>
      <div>
          <label>Judul Buku:</label><br>
          <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}">
      </div>
      <br>
      <div>
          <label>Penulis:</label><br>
          <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}">
      </div>
      <br>
      <div>
          <label>Stok:</label><br>
          <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}">
      </div>
      <br>
      <div>
          <label>Kategori:</label><br>
          <input type="text" name="kategori" value="{{ old('kategori', $buku->kategori) }}">
      </div>
      <br>
      
      <button type="submit">Perbarui</button>
      <a href="{{ route('buku.index') }}">Batal</a>
  </form>
@endsection