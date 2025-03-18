<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:Pelanggan, email',
            'tanggal_lahir' => 'required|date',
            'noTelp' => 'required|string' ,
            
        ]);

        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'noTelp' => $request->noTelp,
            'verified' => 0,
            'poin' => 0
        ]);

        $this->sendverificationEmail($pelanggan);

        return response()->json([
            'message' => 'Berhasil mendaftar, silahkan cek email anda untuk verifikasi',
            'data' => $pelanggan,

        ], 201);
    }

    private function sendverificationEmail($pelanggan){
        //TINGGAL BUAT EMAILNYA SAMA PAHAMIN KODE YG BUAT ISI DATA DI HTML DAN KIRIM EMIALNYA
        $token = urlencode(base64_encode($pelanggan->email . '|' . hash_hmac('sha256', $pelanggan->email,env('APP_KEY'))));

        $verificationLink = url("/api/verify-email?token=$token");

        $html = file_get_contents(resource_path('views/emails/verify.html'));
        $html = str_replace('{{ verification_link }}', $verificationLink, $html);

        Mail::send([], [], function ($message) use ($html, $pelanggan) {
            $message->to($pelanggan->email)
                    ->subject('Verifikasi Akun Anda')
                    ->setBody($html, 'text/html');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
