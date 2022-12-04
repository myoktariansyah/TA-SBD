<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PakanController extends Controller
{
   /**pakan Page */
    public function pakan() {
        $datas = DB::select('select * from pakan');
        return view('hewan.pakan')->with('datas', $datas);
    }

    public function createpakan() {
        return view('hewan.addpakan');
        }
        public function storepakan(Request $request) {
        $request->validate([
        
        'id_pakan' => 'required',
        'nama_p' => 'required',
        'jenis_p' => 'required',
        

        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pakan (id_pakan, nama_p, jenis_p) 
        VALUES (:id_pakan, :nama_p, :jenis_p )',
        [
        'id_pakan' => $request->id_pakan,
        'nama_p' => $request->nama_p,
        'jenis_p' => $request->jenis_p,
      

        ]
        );
        return redirect()->route('hewan.pakan')->with('success', 'Data hewan berhasil disimpan');
    }
    public function editpakan($id) {
        $data = DB::table('pakan')->where('id_pakan', $id)->first();
        return view('hewan.editpakan')->with('data', $data);
        }
        public function updatepakan($id, Request $request) {
        $request->validate([
        'id_pakan' => 'required',
        'nama_p' => 'required',
        'jenis_p' => 'required',
        
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pakan SET nama_p = :nama_p, jenis_p = :jenis_p
        where id_pakan = :id_pakan',
        [
        'id_pakan' => $id,
        'nama_p' => $request->nama_p,
        'jenis_p' => $request->jenis_p,
        
        ]
        );
        return redirect()->route('hewan.pakan')->with('success', 'Data pakan berhasil diubah');
    }
    public function deletepakan($id) {
        DB::update('UPDATE hewan SET  id_pakan = NULL where id_pakan = :id_pakan',
        [
        'id_pakan' => $id,
        ]
        );
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pakan WHERE id_pakan = :id_pakan', ['id_pakan' => $id]);
        return redirect()->route('hewan.pakan')->with('success', 'Data pakan berhasil dihapus');
    }

}
