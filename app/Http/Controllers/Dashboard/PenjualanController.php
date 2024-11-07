<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelangan;
use App\Models\Produk;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
  public function index() {
    $penjualan = Penjualan::with('pelangan')->get();
    $pelangan = Pelangan::all();
    return view('dashboard.penjualan.index', ['penjualan' => $penjualan,
      'pelangan' => $pelangan]);
  }

  public function create(Request $request) {

    $penjualan = Penjualan::create([
      'pelangan_id' => $request->pelangan_id,
      'tanggal_penjualan' => now(),
      'total_harga' => 0
    ]);
    return
    redirect()->route('dashboard.penjualan.detail.create', $penjualan->id);
  }
  public function detailCreate($id) {
    $penjualan = Penjualan::findOrFail($id);
    $nama_pelangan = $penjualan->pelangan->nama_pelangan;

    $produk = Produk::all();
    $detail_penjualan = DetailPenjualan::where('penjualan_id',
      $penjualan->id)->with('produk')->get();

    $total_harga = $detail_penjualan->sum('subtotal');



    return view('dashboard.penjualan.detail_penjualan', [
      'penjualan_id' => $penjualan->id,
      'nama_pelangan' => $nama_pelangan,
      'produk' => $produk,
      'detail_penjualan' => $detail_penjualan,
      'total_harga' => $total_harga
    ]);
  }
  public function detailStore(Request $request) {
    $request->validate([
      'produk_id' => 'required',
      'jumlah_produk' => 'required'
      ]);

    $produk = Produk::find($request->produk_id);
    if ($request->jumlah_produk > $produk->stock) {
      return back()->with('error', 'jumlah produk melebihi jumlah stok yang ada!!');
    }
    $produk->stock -= $request->jumlah_produk;
    $produk->save();

    $harga_produk = $produk->harga;
    $subtotal = $harga_produk * $request->jumlah_produk;

    $detail_penjualan_by_produk = DetailPenjualan::where('penjualan_id',
      $request->penjualan_id)->where('produk_id',
      $request->produk_id)->first();


    if (isset($detail_penjualan_by_produk->produk_id) == $request->produk_id) {
      $detail_penjualan_by_produk->jumlah_produk += $request->jumlah_produk;
      $detail_penjualan_by_produk->save();

      return redirect()->route('dashboard.penjualan.detail.create',
        $request->penjualan_id);
    }




    DetailPenjualan::create([
      'penjualan_id' => $request->penjualan_id,
      'produk_id' => $request->produk_id,
      'jumlah_produk' => $request->jumlah_produk,
      'subtotal' => $subtotal,
    ]);

    return redirect()->route('dashboard.penjualan.detail.create',
      $request->penjualan_id);
  }

  public function store(Request $request) {
    $penjualan = Penjualan::find($request->penjualan_id);
    $penjualan->update([
      'total_harga' => $request->total_harga
    ]);
    return redirect()->route('dashboard.penjualan.index')->with('message', 'penjualan
    berhasil');
  }
  
  public function destroy($id)
  {
    $penjualan = Penjualan::findOrFail($id);
    $penjualan->delete();
    return redirect()->route('dashboard.penjualan.index')->with('message', 'penjualan
    berhasil di hapus');
  }
}