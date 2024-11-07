<x-dashboard-layout>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
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
          data-target="#tambahpenjualan">
          <i class="fas fa-fw  fa-plus"></i>
          Tambah Penjualan
        </button>

        <!-- Modal -->

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Pelangan</th>
              <th>Tanggal Penjualan</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Nama Pelangan</th>
              <th>Tanggal Penjualan</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($penjualan as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->pelangan->nama_pelangan }}</td>
              <td>{{ $data->tanggal_penjualan }}</td>
              <td>{{ $data->total_harga }}</td>
              <td class="d-flex">

                
                  <button type="button" data-toggle="modal"
                    data-target="#editproduk{{ $data->id }}" class=" btn btn-sm
                    m-1
                    btn-warning">           <i class="fas fa-fw
                      fa-edit"></i>edit</button>
                
              
                  <form onsubmit="return confirm('Apakah Anda
                      yakin?');" action="{{ route('dashboard.penjualan.destroy', $data->id) }}" method="post" accept-charset="utf-8">
                    @csrf
                    @method('delete')
                    <button type="submit"  class="btn btn-sm m-1 btn-danger">          <i
                        class="fas fa-fw  fa-trash"></i>hapus</button>
                  </form>
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




<div class="modal fade" id="tambahpenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Form Tambah
Penjualan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form id="myForm" action="/dashboard/penjualan/create" method="post" accept-charset="utf-8">
@csrf
<div class="form-group">
<label class="form-label">Nama Pelangan</label>


<select name="pelangan_id" id="" class="form-control @error('nama_produk') is-invalid
@enderror" >
  <option value=""  selected >-- Pilih Pelangan --</option>
  @foreach($pelangan as $item)
  <option value="{{ $item->id }}">{{ $item->nama_pelangan }}</option>
  @endforeach
</select>
@error('nama_produk')
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