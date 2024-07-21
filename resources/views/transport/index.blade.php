@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data Kendaraan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="dashboard/admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="/kendaraan">Data Kendaran</a></div>
    </div>
  </div>
  <div class="section-body">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade mt-3 ">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">Tambah Kendaran</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama Kendaraan</th>
                    <th>Tipe Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transports as $transport)    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $transport->name }}</td>
                      <td>{{ $transport->product_type }}</td>
                      <td>{{ $transport->transportation_type }}</td>
                      <td>
                        <button class="btn btn-primary details-btn" data-toggle="modal" data-target="#showDataModal" data-id="{{ $transport->id }}" >Detail</button>
                        <a href="{{ route('kendaraan.edit', $transport->id) }}"><button class="btn btn-warning">Edit</button></a>
                        <form action="{{ route('kendaraan.destroy', $transport->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Kendaraan Ini')">Hapus</button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Modal show data --}}
<div class="modal fade" tabindex="-1" role="dialog" id="showDataModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Data Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label>Nama Kendaraan: </label>
          <label id="modalKendaraanName"></label>
        </div>
        <div class="form-group mb-3">
          <label>Tipe Kendaraan: </label>
          <label id="modalKendaraanType"></label>
        </div>
        <div class="form-group mb-3">
          <label>Jenis Kendaraan: </label>
          <label id="modalKendaraanJenis"></label>
        </div>
        <div class="form-group mb-3">
          <label>BBM (Liter): </label>
          <label id="modalKendaraanBBM"></label>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.details-btn').on('click', function() {
        var kendaraanId = $(this).data('id');
        
        // Menentukan kendaraan yang ditampilkan
        $.ajax({
          url: '/kendaraan/' + kendaraanId,
          method: 'GET',
          success: function(data) {
                $('#modalKendaraanName').text(data.name);
                $('#modalKendaraanType').text(data.product_type);
                $('#modalKendaraanJenis').text(data.transportation_type);
                $('#modalKendaraanBBM').text(data.fuel);

            },
            error: function() {
                alert('Failed to fetch company details.');
            }
        });
    });
  });
</script>

@endsection