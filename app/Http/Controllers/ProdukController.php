<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request) {
        if($request->has('search')){
        $datas = DB::select('select * from produk WHERE jenis_biji like :search AND recycle=0',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        $datasrecycle = DB::select('select * from produk WHERE jenis_biji like :search AND recycle=1',[
            'search'=>'%'.$request->search.'%',
        ]);

        return view('produk.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);
        }
       else{
        $datas = DB::select('select * from produk WHERE recycle=0');
        $datasrecycle = DB::select('select * from produk WHERE recycle=1');

        return view('produk.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);   
       }
    }
    public function join(Request $request) {
        if($request->has('search')){
            $datas = DB::select('SELECT pembeli.id_pembeli,alat.id_alat,alat.nama_alat,alat.harga,pembeli.kuantiti,pembeli.total,pembeli.tanggal,produk.nama_produk,produk.jenis_biji FROM `alat` LEFT JOIN pembeli ON pembeli.id_pembeli = alat.id_pembeli LEFT JOIN produk on produk.id_produk = alat.id_produk WHERE produk.jenis_biji like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

        return view('join')
            ->with('datas', $datas);
        }
        else {
            $datas = DB::select('SELECT pembeli.id_pembeli,alat.id_alat,alat.nama_alat,alat.harga,pembeli.kuantiti,pembeli.total,pembeli.tanggal,produk.nama_produk,produk.jenis_biji FROM `alat` LEFT JOIN pembeli ON pembeli.id_pembeli = alat.id_pembeli LEFT JOIN produk on produk.id_produk = alat.id_produk');

        return view('join')
            ->with('datas', $datas);
        }
    }
    public function create() {
        return view('produk.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'jenis_biji' => 'required',
            'asal' => 'required',
            'stok' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO produk(id_produk, nama_produk, jenis_biji, asal, stok) VALUES (:id_produk, :nama_produk, :jenis_biji, :asal, :stok)',
        [
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'jenis_biji' => $request->jenis_biji,
            'asal' => $request->asal,
            'stok'=> $request->stok,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('produk')->where('id_produk', $id)->first();

        return view('produk.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'jenis_biji' => 'required',
            'asal' => 'required',
            'stok' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE produk SET id_produk = :id_produk, nama_produk = :nama_produk, jenis_biji = :jenis_biji, asal = :asal, stok = :stok WHERE id_produk = :id',
        [
            'id' => $id,
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'jenis_biji' => $request->jenis_biji,
            'asal' => $request->asal,
            'stok'=> $request->stok,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_biji' => $request->jenis_biji,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM produk WHERE id_produk = :id_produk', ['id_produk' => $id]);
        return redirect()->route('produk.index')->with('success', 'Data Admin berhasil dihapus');
    }
    public function recycle($id) {
        DB::update('UPDATE produk set recycle = 1 WHERE id_produk = :id_produk', ['id_produk' => $id]);
        return redirect()->route('produk.index')->with('success', 'Data Admin berhasil dihapus');
    }
    public function restore($id) {
        DB::update('UPDATE produk set recycle = 0 WHERE id_produk = :id_produk', ['id_produk' => $id]);
        return redirect()->route('produk.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
