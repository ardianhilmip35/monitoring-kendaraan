@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data Kendaraan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="dashboard/admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="/kendaran">Data Kendaran</a></div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label>Nama Kendaraan</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group mb-3">
          <label>Tipe Kendaraan</label>
          <input type="text" class="form-control" name="product_type" required>
        </div>
        <div class="form-group mb-3">
          <label>Jenis Kendaraan</label>
          <select class="form-control" name="transportation_type" required>
            <option selected disabled value="">Pilih Salah Satu</option>
            <option value="Angkutan Orang">Angkutan Orang</option>
            <option value="Angkutan Barang">Angkutan Barang</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label>BBM (Liter)</label>
          <input type="number" class="form-control" name="fuel" required>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>

</section>

@endsection
