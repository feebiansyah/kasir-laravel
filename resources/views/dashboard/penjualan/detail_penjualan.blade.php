<x-dashboard-layout>
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
        </div>

        <div class="card-body">
          <form action="{{ route('dashboard.penjualan.detail.store') }}" method="post">
            @csrf
            <input type="hidden" name="penjualan_id" value="{{$penjualan_id}}">

            <div class="form-group">
              <label for="" class="form-label">Nama Pelangan</label>
              <input type="text" readonly class="form-control" value="{{
              $nama_pelangan }}">
            </div>
            <div class="row mb-4">
              <div class="col">
                <div data-mdb-input-init class="form-outline">
                  <select name="produk_id" id="" class="form-control
                  @error('produk_id')
                  is-invalid
                  @enderror">
                    <option value="" selected>-- Produk --</option>
                    @foreach($produk as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_produk }} |
                    stok 
                    {{$item->stock}}</option>
                    @endforeach
                  </select>
                  @error('produk_id')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                  <label class="form-label mt-2" for="form6Example1">Nama Produk</label>
                  
                </div>
              </div>
              <div class="col">
                <div data-mdb-input-init class="form-outline">
                  <input type="number" name="jumlah_produk" id="form6Example2" class="form-control @error('produk_id')
                  is-invalid
                  @enderror"
                  />
                  @error('produk_id')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                <label class="form-label" for="form6Example2">Jumlah</label>
              </div>
            </div>
          </div>
          <button data-mdb-ripple-init type="submit" class="btn btn-primary
            btn-block mb-4">Keranjang</button>
        </form>
      </div>
    </div>

  </div>
  <div class="col-md-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Penjualan</h6>
        </div>

        <div class="card-body">
          <form action="{{ route('dashboard.penjualan.store') }}" method="post">
            @csrf
            <input type="hidden" name="penjualan_id" value="{{$penjualan_id}}">
  
         
            <div class="form-group">
              <label for="" class="form-label">Total Harga</label>
              <input type="text" readonly class="form-control" name="total_harga" value="{{
              $total_harga }}">
            </div>
           
          <button data-mdb-ripple-init type="submit" class="btn btn-success
            btn-block mb-2">Order</button>
          <a href="/dashboard/penjualan"class="btn btn-danger
            btn-block mb-4">Kembali</a>
        </form>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
        </div>
        <div class="card-body">
          @if(Session::has('message'))
          <div class="alert alert-success">
            {{ Session::get('message') }}
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger">
            {{ Session::get('error') }}
          </div>
          @endif

          <!-- Modal -->

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($detail_penjualan as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->produk->nama_produk }}</td>
                <td>{{ $data->produk->harga }}</td>
                <td>{{ $data->jumlah_produk }}</td>
                <td>{{ $data->subtotal }}</td>
                <td class=" d-flex justify-content-around">

                  <div>
                    <form action="" onsubmit="return confirm('Apakah Anda
                        yakin?')" method="post" accept-charset="utf-8">
                      @csrf
                      @method('delete')
                      <button type="submit"  class="btn btn-sm btn-danger">          <i
                          class="fas fa-fw  fa-trash"></i>hapus</button>
                    </form>
                  </div>

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
</x-dashboard-layout>