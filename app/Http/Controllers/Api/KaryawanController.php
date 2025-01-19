<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json(Karyawan::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:35',
            'nik' => 'required|integer|max:16',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        Karyawan::create($validated);

        return response()->json(['message' => 'Karyawan berhasil ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:35',
            'nik' => 'required|integer|max:16',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        $karyawan->update($validated);

        return response()->json(['message' => 'Karyawan berhasil diubah']);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return response()->json(['message' => 'Karyawan berhasil dihapus']);
    }

}
