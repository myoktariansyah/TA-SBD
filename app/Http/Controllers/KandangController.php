<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class KandangController extends Controller
{
   /**Kandang Page */
    public function kandang() {
        $datas = DB::select('select * from kandang');
        return view('hewan.kandang')->with('datas', $datas);
    }
    public function createkandang() {
        return view('hewan.addkandang');
        }
        public function storekandang(Request $request) {
        $request->validate([
        
        'id_kandang' => 'required',
        'jenis_k' => 'required',
        'tipe_k' => 'required',
        'kapasitas' => 'required',

        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kandang (id_kandang, jenis_k, tipe_k, kapasitas) 
        VALUES (:id_kandang, :jenis_k, :tipe_k, :kapasitas)',
        [
        'id_kandang' => $request->id_kandang,
        'jenis_k' => $request->jenis_k,
        'tipe_k' => $request->tipe_k,
        'kapasitas' => $request->kapasitas,

        ]
        );
        return redirect()->route('hewan.kandang')->with('success', 'Data hewan berhasil disimpan');
    }
    public function editkandang($id) {
        $data = DB::table('kandang')->where('id_kandang', $id)->first();
        return view('hewan.editkandang')->with('data', $data);
        }
        public function updatekandang($id, Request $request) {
        $request->validate([
        'id_kandang' => 'required',
        'jenis_k' => 'required',
        'tipe_k' => 'required',
        'kapasitas' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kandang SET jenis_k = :jenis_k, tipe_k = :tipe_k, kapasitas = :kapasitas 
        where id_kandang = :id_kandang',
        [
        'id_kandang' => $id,
        'jenis_k' => $request->jenis_k,
        'tipe_k' => $request->tipe_k,
        'kapasitas' => $request->kapasitas,
        ]
        );
        return redirect()->route('hewan.kandang')->with('success', 'Data kandang berhasil diubah');
    }
    public function deletekandang($id) {
        DB::update('UPDATE hewan SET id_kandang = NULL where id_kandang = :id_kandang',
        [
        'id_kandang' => $id,
        ]
        );
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM kandang WHERE id_kandang = :id_kandang', ['id_kandang' => $id]);
        return redirect()->route('hewan.kandang')->with('success', 'Data kandang berhasil dihapus');
    }

  
}
