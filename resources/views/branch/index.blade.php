@extends('layouts.main')

@section('main-content')
<section class="section">
  <div class="section-header">
    <h1>Data Cabang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="dashboard/admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="/branch">Data Cabang</a></div>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#newDataModal">Tambah Cabang</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama Region</th>
                    <th>Jenis Cabang</th>
                    <th>Alamat Cabang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($branchs as $branch)    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $branch->region }}</td>
                      <td>{{ $branch->role_branch }}</td>
                      <td>{{ $branch->address }}</td>
                      <td>
                        <button class="btn btn-primary details-btn" data-toggle="modal" data-target="#showDataModal" data-id="{{ $branch->id }}" >Detail</button>
                        <button class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editDataModal" data-id="{{ $branch->id }}">Edit</button>
                        <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Cabang Ini')">Hapus</button>
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

{{-- Modal create new data --}}
<div class="modal fade" tabindex="-1" role="dialog" id="newDataModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Cabang Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('branch.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama Region</label>
            <input type="text" class="form-control" name="region" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="address" required>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select class="form-control" name="role_branch" required>
                <option selected disabled value="">Pilih Jenis Cabang</option>
                <option value="Kantor Pusat">Kantor Pusat</option>
                <option value="Kantor Cabang">Kantor Cabang</option>
                <option value="Tambang">Tambang</option>
            </select>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal show data --}}
<div class="modal fade" tabindex="-1" role="dialog" id="showDataModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Data Cabang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Region</label>
          <input type="text" class="form-control" id="modalBranchRegion" readonly> 
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control" id="modalBranchAddress" readonly>
        </div>
        <div class="form-group">
          <label>Jenis Cabang</label>
          <input type="text" class="form-control" id="modalBranchRole" readonly>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal edit data --}}
<div class="modal fade" tabindex="-1" role="dialog" id="editDataModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Cabang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editBranchForm" action="#" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Region</label>
            <input type="text" class="form-control" name="region" id="editBranchRegion" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="address" id="editBranchAddress" required>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select class="form-control" name="role_branch" id="editBranchRole" required>
                <option selected disabled value="">Pilih Jenis Cabang</option>
                <option value="Kantor Pusat">Kantor Pusat</option>
                <option value="Kantor Cabang">Kantor Cabang</option>
                <option value="Tambang">Tambang</option>
            </select>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



  {{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.details-btn').on('click', function() {
        var branchId = $(this).data('id');
        
        // Menentukan perusahaan yang ditampilkankan
        $.ajax({
            url: '/branch/' + branchId,
            method: 'GET',
            success: function(data) {
                // Populate the modal with the branch data
                $('#modalBranchRegion').val(data.region);
                $('#modalBranchRole').val(data.role_branch);
                $('#modalBranchAddress').val(data.address);
            },
            error: function() {
                alert('Failed to fetch branch details.');
            }
        });
    });
  });
  
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
        var branchId = $(this).data('id');

        $('#editBranchForm').attr('action', '//' + branchId);

        $.ajax({
            url: '/branch/' + branchId,
            method: 'GET',
            success: function(data) {
                $('#editBranchRegion').val(data.region);
                $('#editBranchAddress').val(data.address);
                $('#editBranchRole').val(data.role_branch);
            },
            error: function() {
                alert('Failed to fetch branch details.');
            }
        });
    });
  });
</script>

@endsection