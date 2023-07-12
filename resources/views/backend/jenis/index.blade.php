@extends('backend.layouts.master') 

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-table mr-2"></span>
          Data Jenis
        </h4>

        <div class="card-tools">
          <a href="{{ route('jenis.create') }}" class="btn btn-xs btn-success px-3">
            <span class="fa fa-plus mr-2"></span>
            Tambah Data Jenis
          </a>
        </div>
      </div>

      <div class="card-body p-0 table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Jenis</th>
              <th>Nama Jenis</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($dataJenis as $item)
              <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $item->kode_jenis }}</td>
                <td>{{ $item->nama_jenis }}</td>
                <td>{{ $item->keterangan != null ? $item->keterangan : 'Tidak Ada Keterangan' }}</td>
                <td>
                  <div class="btn-group">
                    <form action="{{ route('jenis.destroy', $item->id) }}" method="post">
                      @method('DELETE')
                      @csrf
                      
                      <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-xs btn-warning">
                        Edit Data
                      </a>

                      <button type="submit" class="btn btn-xs btn-danger">
                        Hapus Data
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">Belum Ada Data Jenis</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="card-footer text-right">
        Halaman Data Jenis
      </div>
    </div>
  </div>
</div>
@endsection