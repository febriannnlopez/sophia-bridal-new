<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * EnsureStaffOrOwner middleware.
 *
 * Pastikan user yang akses route adalah Admin (Owner atau Staff).
 * Dipakai untuk proteksi panel admin secara umum.
 */
class EnsureStaffOrOwner
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

        // Bukan Admin (Owner/Staff) → 403
        if (! $request->user()->isAdmin()) {
            abort(403, 'Halaman ini hanya dapat diakses oleh Admin.');
        }

        return $next($request);
    }
}
