<x-dashboard-layout>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pelangan</h6>
    </div>
    <div class="card-body">
      @if(Session::has('message'))
      <div class="alert alert-success">
        {{ Session::get('message') }}
      </div>
      @endif

      <div class="table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
          data-target="#tambahpenguna">
          <i class="fas fa-fw  fa-plus"></i>Tambah Pelangan
        </button>

        <!-- Modal -->

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Pelangan</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Nama Pelangan</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($pelangan as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nama_pelangan }}</td>
              <td>{{ $data->alamat }}</td>
              <td>{{ $data->no_telepon }}</td>
              <td class=" d-flex justify-content-between">

                <div>
                  <button type="button" data-toggle="modal"
                    data-target="#editpelangan{{ $data->id }}" class=" btn btn-sm
                    btn-warning">           <i class="fas fa-fw
                      fa-edit"></i>edit</button>
                </div>
                <div>
                  <form action="{{ route('dashboard.pelangan.destroy', $data->id) }}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('apakah anda
                    yakin')" class="btn btn-sm btn-danger">           <i
                        class="fas fa-fw  fa-trash"></i>hapus</button>
                  </form>
                </div>

              </td>
            </tr>

            <div class="modal fade" id="editpelangan{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit
                      Pelangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="myForm" action="{{
                      route('dashboard.pelangan.update', $data->id) }}" method="post"
                      accept-charset="utf-8">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label class="form-label">Nama Pelangan</label>
                        <input type="text" name="nama_pelangan" value="{{
                        old('nama_pelangan', $data->nama_pelangan) }}"
                        class="form-control @error('nama_pelangan') is-invalid
                        @enderror" />
                      @error('nama_pelangan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Alamat</label>
                      <textarea name="alamat" rows="2" cols="2"
                        class="form-control @error('alamat') is-invalid
                        @enderror">{{ old('alamat', $data->alamat) }}</textarea>

                      @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">NO Telepon</label>
                      <input type="number" name="no_telepon" value="{{
                      old('no_telepon', $data->no_telepon) }}"
                      class="form-control @error('no_telepon') is-invalid
                      @enderror" />
                    @error('no_telepon')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>




<div class="modal fade" id="tambahpenguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Form Tambah
Pelangan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form id="myForm" action="/dashboard/pelangan" method="post" accept-charset="utf-8">
@csrf
<div class="form-group">
<label class="form-label">Nama Pelangan</label>
<input type="text" name="nama_pelangan" value="{{
old('nama_pelangan') }}"
class="form-control @error('nama_pelangan') is-invalid
@enderror" />
@error('nama_pelangan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<label class="form-label">Alamat</label>
<textarea name="alamat" rows="2" cols="2"
class="form-control @error('alamat') is-invalid
@enderror">{{ old('alamat') }}</textarea>

@error('alamat')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<label class="form-label">NO Telepon</label>
<input type="number" name="no_telepon" value="{{
old('no_telepon') }}"
class="form-control @error('no_telepon') is-invalid
@enderror" />
@error('no_telepon')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

</x-dashboard-layout>