@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-table mr-3"></span>
          Data Satuan
        </h4>

        <div class="card-tools">
          <a href="{{ route('satuan.create') }}" class="btn btn-xs btn-success">
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
              <th>Nama</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($dataSatuan as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_satuan }}</td>
                <td>{{ $item->nama_satuan }}</td>
                <td>{{ $item->keterangan == null ? 'Tidak Ada Keterangan' : $item->keterangan  }}</td>
                <td>
                  <form action="{{ route('satuan.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('satuan.edit', $item->id) }}" class="btn btn-xs btn-warning">
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