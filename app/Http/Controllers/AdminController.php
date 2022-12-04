<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $datas = DB::select('SELECT H.id_hewan,H.nama,H.spesies,H.klasifikasi,K.jenis_k,P.nama_p FROM hewan H
            LEFT JOIN kandang K  on K.id_kandang = H.id_kandang LEFT JOIN pakan P on P.id_pakan = H.id_pakan  WHERE H.nama like :search', [
                'search' => '%' . $request->search . '%',
            ]);

            return view('hewan.index')
                ->with('datas', $datas);
        } else {
            $datas = DB::select('SELECT H.id_hewan,H.nama,H.spesies,H.klasifikasi,K.jenis_k,P.nama_p FROM hewan H
            LEFT JOIN kandang K  on K.id_kandang = H.id_kandang LEFT JOIN pakan P on P.id_pakan = H.id_pakan 
            ');

            return view('hewan.index')
                ->with('datas', $datas);
        }
    }

    public function trash()
    {
        $datas = DB::select('SELECT H.id_hewan,H.nama,H.spesies,H.klasifikasi,K.jenis_k,P.nama_p FROM hewan H
            LEFT JOIN kandang K  on K.id_kandang = H.id_kandang LEFT JOIN pakan P on P.id_pakan = H.id_pakan WHERE H.is_delete = 1
            ');




        return view('hewan.trash')
            ->with('datas', $datas);
    }

    public function create()
    {
        return view('hewan.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_hewan' => 'required',
            'nama' => 'required',
            'spesies' => 'required',
            'klasifikasi' => 'required',
            'id_kandang' => 'required',
            'id_pakan' => 'required',
            'is_delete' => '',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO hewan(id_hewan, nama, spesies, klasifikasi, id_kandang,id_pakan,is_delete) VALUES (:id_hewan, :nama, :spesies, :klasifikasi, :id_kandang,:id_pakan,:is_delete)',
            [
                'id_hewan' => $request->id_hewan,
                'nama' => $request->nama,
                'spesies' => $request->spesies,
                'klasifikasi' => $request->klasifikasi,
                'id_kandang' => $request->id_kandang,
                'id_pakan' => $request->id_pakan,
                'is_delete' => $request->is_delete,
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

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('hewan')->where('id_hewan', $id)->first();

        return view('hewan.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_hewan' => 'required',
            'nama' => 'required',
            'spesies' => 'required',
            'klasifikasi' => 'required',
            'id_kandang' => 'required',
            'id_pakan' => 'required',
            'is_delete' => '',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE hewan SET id_hewan = :id_hewan, nama = :nama, spesies = :spesies, klasifikasi = :klasifikasi, id_kandang = :id_kandang,id_pakan = :id_pakan , is_delete = :is_delete WHERE id_hewan = :id',
            [
                'id' => $id,
                'id_hewan' => $request->id_hewan,
                'nama' => $request->nama,
                'spesies' => $request->spesies,
                'klasifikasi' => $request->klasifikasi,
                'id_kandang' => $request->id_kandang,
                'id_pakan' => $request->id_pakan,
                'is_delete' => $request->is_delete,
            ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM hewan WHERE id_hewan = :id_hewan', ['id_hewan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus');
    }

    public function softdelete($id)
    {
        DB::update('UPDATE hewan SET is_delete = 1 where id_hewan = :id_hewan ', ['id_hewan' => $id]);
        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus');
    }

    public function restore($id)
    {
        DB::update('UPDATE hewan SET is_delete = NULL where id_hewan = :id_hewan ', ['id_hewan' => $id]);
        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus');
    }
}
