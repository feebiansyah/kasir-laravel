<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelangan;

class PelanganController extends Controller
{
  public function index() {
    $pelangan = Pelangan::all();
    return view('dashboard.pelangan.index', [
      'pelangan' => $pelangan]);
  }
  public function store(Request $request) {
    $validate_data = $request->validate([
      'nama_pelangan' => 'required',
      'alamat' => 'required',
      'no_telepon' => 'required'
    ]);

    Pelangan::create($validate_data);
    return redirect()->route('dashboard.pelangan.index')->with('message',
      'data pelangan berhasil di tambah');
  }

  public function update(Request $request, $id) {
    $validate_data = $request->validate([
      'nama_pelangan' => 'required',
      'alamat' => 'required',
      'no_telepon' => 'required'
    ]);
    $pelangan = Pelangan::findOrFail($id);
    $pelangan->update($validate_data);
    return redirect()->route('dashboard.pelangan.index')->with('message',
      'data pelangan berhasil di update');
  }

  public function destroy($id) {
    $pelangan = Pelangan::findOrFail($id);
    $pelangan->delete();
    return redirect()->route('dashboard.pelangan.index')->with('message',
      'data pelangan berhasil di hapus');
  }
}