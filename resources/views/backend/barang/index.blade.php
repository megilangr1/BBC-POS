@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-table mr-3"></span>
          Data Barang
        </h4>

        <div class="card-tools">
          <a href="{{ route('barang.create') }}" class="btn btn-xs btn-success">
            Tambah Data Baru
          </a>
        </div>
      </div>

      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode</th>
              <th>Jenis</th>
              <th>Nama</th>
              <th>Satuan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($dataBarang as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->jenis->kode_jenis }} - {{ $item->jenis->nama_jenis }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->satuan->nama_satuan }}</td>
                <td>{{ $item->keterangan == null ? 'Tidak Ada Keterangan' : $item->keterangan  }}</td>
                <td>
                  <form action="{{ route('barang.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-xs btn-warning">
                      Edit Data
                    </a>
                    
                    <button type="submit" class="btn btn-xs btn-danger">
                      Hapus Data
                    </button>
                  </form>
                </td>
              </tr>
            @empty 
              <tr>
                <td colspan="5">Belum Ada Data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection