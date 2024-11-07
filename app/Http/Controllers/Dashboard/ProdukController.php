<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
      $produk = Produk::all();
      return view('dashboard.produk.index', ['produk' => $produk]);
    }
    public function store(Request $request)
    {
      $validate_data = $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required',
        'stock' => 'required',
        ]);
        
        Produk::create($validate_data);
        return redirect()->route('dashboard.produk.index')->with('message',
        'data produk berhasil di tambah');
    }
    
    public function update(Request $request, $id)
    {
       $validate_data = $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required',
        'stock' => 'required',
        ]);
        
        $produk = Produk::findOrFail($id);
        $produk->update($validate_data);
        return redirect()->route('dashboard.produk.index')->with('message',
        'data produk berhasil di update');
    }
    
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('dashboard.produk.index')->with('message',
        'data produk berhasil di hapus');
    }
}
