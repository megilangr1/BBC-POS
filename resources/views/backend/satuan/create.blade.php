@extends('backend.layouts.master')  

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-edit mr-3"></span>
          Form Tambah Data Satuan
        </h4>

        <div class="card-tools">
          <a href="{{ route('satuan.index') }}" class="btn btn-xs btn-danger">
            Kembali
          </a>
        </div>
      </div>

      <div class="card-body">
        <form action="{{ route('satuan.store') }}" method="post">
          @csrf

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_satuan">Kode Satuan :</label>
                <input type="text" name="kode_satuan" id="kode_satuan" class="form-control {{ $errors->has('kode_satuan') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Kode Satuan..." value="{{ old('kode_satuan') }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('kode_satuan') }}
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_satuan">Nama Satuan : </label>
                <input type="text" name="nama_satuan" id="nama_satuan" class="form-control {{ $errors->has('nama_satuan') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Nama Satuan..." value="{{ old('nama_satuan') }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('nama_satuan') }}
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
                Buat Data Satuan
              </button>
            </div>
            <div class="col-md-4">
              <button type="reset" class="btn btn-danger btn-block">
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