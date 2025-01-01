<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS');
        // header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Cookie');

        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'armada' => 'nullable',
            'message' => 'nullable',
            'tanggal' => 'nullable'
        ]);

        try {
            // Simpan data ke database
            $booking = new Reservasi();
            $booking->name = $validated['name'];
            $booking->email = $validated['email'];
            $booking->nomor_telepon = $validated['phone']; // Pastikan kolom sesuai
            $booking->armada = $validated['armada'];
            $booking->tanggal = $validated['tanggal'];
            $booking->pesan = $validated['message'] ?? null;
            $booking->save();

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
