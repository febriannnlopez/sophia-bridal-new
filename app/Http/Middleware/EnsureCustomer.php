<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * EnsureCustomer middleware.
 *
 * Pastikan user yang akses route adalah Pelanggan.
 * Dipakai untuk proteksi area khusus pelanggan (history booking, wallet, dll).
 */
class EnsureCustomer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login → ke halaman login
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // Akun di-suspend
        if (! $request->user()->is_active) {
           Auth::logout();

            return redirect()->route('login')
                ->withErrors(['email' => 'Akun Anda telah dinonaktifkan.']);
        }

        // Bukan Pelanggan → 403
        if (! $request->user()->isCustomer()) {
            abort(403, 'Halaman ini hanya dapat diakses oleh Pelanggan.');
        }

        return $next($request);
    }
}
