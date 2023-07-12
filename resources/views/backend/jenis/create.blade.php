@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-edit mr-3"></span>
          Form Input Data Jenis
        </h4>

        <div class="card-tools">
          <a href="{{ route('jenis.index') }}" class="btn btn-xs btn-danger px-3">
            <span class="fa fa-arrow-left mr-2"></span>
            Kembali
          </a>
        </div>
      </div>

      <div class="card-body">
        <form action="{{ route('jenis.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_jenis">Kode Jenis : <i class="text-danger">*</i></label>
                <input type="text" name="kode_jenis" id="kode_jenis" class="form-control {{ $errors->has('kode_jenis') ? 'is-invalid':'' }}" placeholder="Masukan Kode Jenis..." value="{{ old('kode_jenis') }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('kode_jenis') }}
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_jenis">Nama Jenis : <i class="text-danger">*</i></label>
                <input type="text" name="nama_jenis" id="nama_jenis" class="form-control {{ $errors->has('nama_jenis') ? 'is-invalid':'' }}" placeholder="Masukan Nama Jenis..." value="{{ old('nama_jenis') }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('nama_jenis') }}
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="keterangan">Keterangan : </label>
                <textarea name="keterangan" id="keterangan" cols="1" rows="1" class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Keterangan...">{{ old('keterangan') }}</textarea>
                <div class="invalid-feedback">
                  {{ $errors->first('keterangan') }}
                </div>
              </div>
            </div>
            <div class="col-12">
              <hr class="mt-0">
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-success btn-block">
                <span class="fa fa-check mr-2"></span>
                Buat Data Jenis
              </button>
            </div>
            <div class="col-md-4">
              <button type="reset" class="btn btn-danger btn-block">
                <span class="fa fa-undo mr-2"></span>
                Reset Input
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection