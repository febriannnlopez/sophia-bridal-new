<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * EnsureOwner middleware.
 *
 * Pastikan user yang akses route adalah Owner.
 * Kalau bukan, redirect ke dashboard atau abort 403.
 */
class EnsureOwner
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

        // Bukan Owner → 403
        if (! $request->user()->isOwner()) {
            abort(403, 'Halaman ini hanya dapat diakses oleh Owner.');
        }

        return $next($request);
    }
}
