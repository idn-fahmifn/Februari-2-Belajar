<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UmurMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $umur = $request->session()->get('umur');
        // jika lebih dari 18 tahun diizinkan masuk.
        if ($umur >= 18 && $umur < 100) {
            // melanjutkan ke halaman selanjutnya.
            return $next($request);
        }
        return redirect()->route('form.umur')->with('gagal','Umur kamu belum cukup');
    }
}
