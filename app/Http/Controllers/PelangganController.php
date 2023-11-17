<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index(): View
    {
        $data_pelanggan = Pelanggan::orderBy('id', 'asc')->get();

        return view('crud.index', compact('data_pelanggan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'email' => 'required',
            'telepon' =>'required',
            'alamat' => 'required',
            'jenis_kelamin' =>'required',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
        ],
        [
            'name.required' => 'Judul Petunjuk tidak boleh kosong',
            'email.required' => 'Isi tidak boleh kosong',
            'telepon.required' => 'Judul Petunjuk tidak boleh kosong',
            'alamat.required' => 'Isi tidak boleh kosong',
            'jenis_kelamin.required' => 'Isi tidak boleh kosong',
            'image' => 'Gambar tidak boleh kosong'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelanggan = new Pelanggan();
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $path = $request->file('image')->storeAs('public/pelanggan', $filename);
            $pelanggan->image = 'public/pelanggan/' . $filename;
        }

        $pelanggan->save();

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id): View
    {
        $data = [
            "edit" => Pelanggan::find($id),
            "ubah" => Pelanggan::get(),
        ];

        return view("crud.edit", $data);
    }

    public function update(Request $request, $id): RedirectResponse
{
    try {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
        ], [
            // Pesan validasi disini...
        ]);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);

        // Cek jika data pelanggan tidak ditemukan
        if (!$pelanggan) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        // Atur nilai properti pada objek pelanggan
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Proses upload gambar dan atur properti $pelanggan->image
        }

        // Simpan perubahan
        $pelanggan->save();

        return back()->with('success', 'Berhasil diupdate');
} catch (QueryException $e) {
    // Tangani kesalahan database
    return back()->with('error', 'Terjadi kesalahan dalam menyimpan perubahan. Pesan kesalahan: ' . $e->getMessage());
} catch (\Exception $e) {
    // Tangani kesalahan umum
    return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi. Pesan kesalahan: ' . $e->getMessage());
}
}


}
