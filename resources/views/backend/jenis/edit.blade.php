@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-edit mr-3"></span>
          Form Edit Data Jenis
        </h4>

        <div class="card-tools">
          <a href="{{ route('jenis.index') }}" class="btn btn-xs btn-danger px-3">
            <span class="fa fa-arrow-left mr-2"></span>
            Kembali
          </a>
        </div>
      </div>

      <div class="card-body">
        <form action="{{ route('jenis.update', $jenis->id) }}" method="post">
          @method('PUT')
          @csrf

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_jenis">Kode Jenis : </label>
                <input type="text" name="kode_jenis" id="kode_jenis" class="form-control" placeholder="Silahkan Masukan Kode Jenis..." value="{{ $jenis->kode_jenis }}" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_jenis">Nama Jenis : </label>
                <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" placeholder="Silahkan Masukan Nama Jenis..." value="{{ $jenis->nama_jenis }}" required>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="keterangan">Keterangan : </label>
                <textarea name="keterangan" id="keterangan" cols="1" rows="1" class="form-control" placeholder="Silahkan Masukan Keterangan...">{{ $jenis->keterangan }}</textarea>
              </div>
            </div>
            <div class="col-12">
              <hr class="mt-0">
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-success btn-block">
                <span class="fa fa-check-circle mr-2"></span>
                Simpan Perubahan Data
              </button>
            </div>
            <div class="col-md-4">
              <button type="reset" class="btn btn-danger btn-block">
                <span class="fa fa-undo mr-2"></span>
                Reset / Batalkan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection