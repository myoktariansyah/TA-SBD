<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembeliController extends Controller
{
    public function index() {
        $datas = DB::select('select * from pembeli');

        return view('pembeli.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pembeli.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
            'kuantiti' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembeli(id_pembeli, tanggal, total, kuantiti) VALUES (:id_pembeli, :tanggal, :total, :kuantiti)',
        [
            'id_pembeli' => $request->id_pembeli,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
            'kuantiti' => $request->kuantiti,
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

        return redirect()->route('pembeli.index')->with('success', 'Data Pembeli berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();

        return view('pembeli.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'tanggal' => 'required',
            'total' => 'required',
            'kuantiti' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pembeli SET id_pembeli = :id_pembeli, tanggal = :tanggal, total = :total, kuantiti = :kuantiti WHERE id_pembeli = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
            'kuantiti' => $request->kuantiti,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'total' => $request->total,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pembeli.index')->with('success', 'Data Pembeli berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_pembeli', $id)->delete();

        return redirect()->route('pembeli.index')->with('success', 'Data Admin berhasil dihapus');
    }


}
