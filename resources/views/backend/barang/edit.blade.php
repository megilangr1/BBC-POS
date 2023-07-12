@extends('backend.layouts.master')  

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <h4 class="card-title">
          <span class="fa fa-edit mr-3"></span>
          Form Tambah Data Barang
        </h4>

        <div class="card-tools">
          <a href="{{ route('barang.index') }}" class="btn btn-xs btn-danger">
            Kembali
          </a>
        </div>
      </div>

      <div class="card-body">
        <form action="{{ route('barang.update', $barang->id) }}" method="post">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control {{ $errors->has('kode_barang') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Kode Barang..." value="{{ $barang->kode_barang }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('kode_barang') }}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_jenis">Jenis Barang :</label>
                <select name="id_jenis" id="id_jenis" class="form-control">
                  <option value="">- Pilih Data Jenis -</option>
                  @foreach ($daftarDataJenis as $jenis)
                    <option value="{{ $jenis->id }}" {{ $barang->id_jenis == $jenis->id ? 'selected':'' }}>{{ $jenis->kode_jenis }} - {{ $jenis->nama_jenis }}</option>
                  @endforeach
                </select>

                <div class="invalid-feedback">
                  {{ $errors->first('kode_barang') }}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_barang">Nama Barang : </label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Nama Barang..." value="{{ $barang->nama_barang }}" required>
                <div class="invalid-feedback">
                  {{ $errors->first('nama_barang') }}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_satuan">Satuan Barang :</label>
                <select name="id_satuan" id="id_satuan" class="form-control">
                  <option value="">- Pilih Data Satuan -</option>
                  @foreach ($dataSatuan as $satuan)
                    <option value="{{ $satuan->id }}" {{ $barang->id_satuan == $satuan->id ? 'selected':'' }}>{{ $satuan->nama_satuan }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  {{ $errors->first('kode_barang') }}
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan">Keterangan : </label>
                <textarea name="keterangan" id="keterangan" cols="1" rows="1" class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}" placeholder="Silahkan Masukan Keterangan...">{{ $barang->keterangan }}</textarea>
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
                Buat Data Barang
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