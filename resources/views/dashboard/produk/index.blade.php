<x-dashboard-layout>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
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
          data-target="#tambahproduk">
                    <i class="fas fa-fw  fa-plus"></i>
          Tambah Produk
        </button>

        <!-- Modal -->

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($produk as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nama_produk }}</td>
              <td>{{ $data->harga }}</td>
              <td>{{ $data->stock }}</td>
              <td class=" d-flex justify-content-around">

                <div>
                  <button type="button" data-toggle="modal"
                    data-target="#editproduk{{ $data->id }}" class=" btn btn-sm
                    btn-warning">           <i class="fas fa-fw
                    fa-edit"></i>edit</button>
                </div>
                <div>
                  <form action="{{ route('dashboard.produk.destroy', $data->id) }}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Apakah Anda
                    yakin?');" class="btn btn-sm btn-danger">          <i
                    class="fas fa-fw  fa-trash"></i>hapus</button>
                  </form>
                </div>

              </td>
            </tr>

            <div class="modal fade" id="editproduk{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit
                      Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="myForm" action="{{
                      route('dashboard.produk.update', $data->id) }}" method="post"
                      accept-charset="utf-8">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" value="{{
                        old('nama_produk', $data->nama_produk) }}"
                        class="form-control @error('nama_produk') is-invalid
                        @enderror" />
                      @error('nama_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-label">Harga</label>
                      <input type="number" name="harga" value="{{
                      old('harga', $data->harga) }}"
                      class="form-control @error('harga') is-invalid
                      @enderror" />

                    @error('harga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stock" value="{{
                    old('stock', $data->stock) }}"
                    class="form-control @error('stock') is-invalid
                    @enderror" />
                  @error('stock')
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




<div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Form Tambah
Produk</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form id="myForm" action="/dashboard/produk" method="post" accept-charset="utf-8">
@csrf
<div class="form-group">
<label class="form-label">Nama Produk</label>
<input type="text" name="nama_produk" value="{{
old('nama_produk') }}"
class="form-control @error('nama_produk') is-invalid
@enderror" />
@error('nama_produk')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<label class="form-label">Harga</label>
<input type="number" name="harga" value="{{
old('harga') }}"
class="form-control @error('harga') is-invalid
@enderror" />

@error('harga')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<label class="form-label">Stok</label>
<input type="number" name="stock" value="{{
old('stock') }}"
class="form-control @error('stock') is-invalid
@enderror" />
@error('stock')
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