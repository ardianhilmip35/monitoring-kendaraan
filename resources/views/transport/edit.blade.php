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
      <form action="{{ route('kendaraan.update', $transport->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $transport->id }}">
        <div class="form-group mb-3">
          <label>Nama Kendaraan</label>
          <input type="text" class="form-control" name="name" value="{{ $transport->name }}" required>
        </div>
        <div class="form-group mb-3">
          <label>Tipe Kendaraan</label>
          <input type="text" class="form-control" name="product_type" value="{{ $transport->product_type }}" required>
        </div>
        <div class="form-group mb-3">
          <label>Jenis Kendaraan</label>
          <select class="form-control" name="transportation_type" required>
            <option value="" selected disabled>Jenis Kendaraan</option>
            <option value="Angkutan Orang" @if ($transport->transportation_type == 'Angkutan Orang') selected @endif>Angkutan Orang</option>
            <option value="Angkutan Barang" @if ($transport->transportation_type == 'Angkutan Barang') selected @endif>Angkutan Barang</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label>BBM (Liter)</label>
          <input type="number" class="form-control" name="fuel" value="{{ $transport->fuel }}" required>
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