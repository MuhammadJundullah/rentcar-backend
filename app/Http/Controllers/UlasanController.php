<?php

namespace App\Http\Controllers;

use App\Filament\Resources\UlasanResource\Pages\ListUlasans;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ulasan::all();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama' => 'nullable',
            'judul' => 'nullable',
            'isi' => 'nullable',
            'rating' => 'nullable',
        ]);

        try {
            // Simpan data ke database
            $Ulasan = new Ulasan();
            $Ulasan->nama = $validated['nama'];
            $Ulasan->judul = $validated['judul'];
            $Ulasan->isi = $validated['isi']; // Pastikan kolom sesuai
            $Ulasan->ratings = $validated['rating'];
            $Ulasan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Booking berhasil dikirim!'
            ], 200);
        } catch (\Exception $e) {
            // \Log::error('Error saat menyimpan reservasi:', ['error' => $e->getMessage()]);

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
