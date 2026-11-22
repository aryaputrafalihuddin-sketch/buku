@extends('layouts.app')
@section('judul', 'Daftar Buku')

@section('konten')
  <h2>Daftar Buku</h2>
  <a href="{{ route('buku.create') }}">+ Tambah Buku Baru</a>

  @if (session('sukses'))
    <p style="color: green;">{{ session('sukses') }}</p>
  @endif

  <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px; width: 100%;">
      <tr>
          <th>Kode Buku</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Stok</th>
          <th>Kategori</th>
          <th>Aksi</th>
      </tr>
      @forelse ($buku as $b)
      <tr>
          <td>{{ $b->kode_buku }}</td>
          <td>{{ $b->judul }}</td>
          <td>{{ $b->penulis }}</td>
          <td>
              @if ($b->stok == 0)
                  <span style="color: red; font-weight: bold;">0 (Habis)</span>
              @else
                  {{ $b->stok }}
              @endif
          </td>
          <td>{{ $b->kategori }}</td>
          <td>
              <a href="{{ route('buku.show', $b->id) }}">Detail</a> |
              <a href="{{ route('buku.edit', $b->id) }}">Ubah</a> |
              <form action="{{ route('buku.destroy', $b->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:none; color:red; border:none; cursor:pointer; padding:0; font:inherit;">Hapus</button>
              </form>
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6" align="center">Belum ada data buku.</td>
      </tr>
      @endforelse
  </table>

  <div style="margin-top: 15px;">
        <style>
          nav svg {
              width: 18px !important;
              height: 18px !important;
              display: inline-block;
          }
      </style>
      {!! $buku->links() !!}
  </div>
@endsection