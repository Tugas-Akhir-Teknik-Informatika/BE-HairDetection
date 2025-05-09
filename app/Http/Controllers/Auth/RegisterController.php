<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Validasi agar email unik
            'password' => 'required|string|min:8|confirmed', // Validasi password dan konfirmasi password
            'otp_code' => 'required|string|size:6',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Cek OTP
        $otp = Otp::where('email', $request->email)
            ->where('code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otp) {
            return response()->json(['message' => 'Kode OTP tidak valid atau sudah kadaluarsa'], 400);
        }

        // Tandai OTP telah digunakan
        $otp->update(['is_used' => true]);


        // Jika validasi berhasil, buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Jangan lupa untuk mengenkripsi password
        ]);

        // Buat token API untuk user
        $token = $user->createToken('apifolika')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Registrasi berhasil',
        ], 201);
    }
}
