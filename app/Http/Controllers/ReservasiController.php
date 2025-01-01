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
        dd($request->all());
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'armada' => 'required|integer|exists:armadas,id', // Validasi armada yang dipilih
            'message' => 'nullable|string|max:500',
        ]);

        // Simpan data ke database jika validasi berhasil
        try {
            // Jika menggunakan model Booking
            $booking = new Reservasi();
            $booking->name = $validated['name'];
            $booking->email = $validated['email'];
            $booking->nomor_telepon = $validated['phone'];
            $booking->armada = $validated['armada'];
            $booking->pesan = $validated['message'];
            $booking->save();

            // Response berhasil
            return response()->json([
                'status' => 'success',
                'message' => 'Booking berhasil dikirim!'
            ], 200);
        } catch (\Exception $e) {
            // Response jika terjadi error
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
