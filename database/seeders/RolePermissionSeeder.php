<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed semua role & permission Sophia Bridal Booking System.
     *
     * Permission disusun per modul biar gampang di-audit:
     * - User Management
     * - Layanan & Paket
     * - Inventory Gaun
     * - Booking
     * - Pembayaran
     * - Wallet & Loyalty
     * - Laporan
     * - Konten Website
     * - Promo & Voucher
     * - Notifikasi
     * - Sistem
     */
    public function run(): void
    {
        // Reset cached roles & permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ============================================================
        // 1. DAFTAR SEMUA PERMISSION (per modul)
        // ============================================================

        $permissions = [
            // --- User Management ---
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            'users.suspend',
            'users.reset_password',

            // --- Layanan & Paket ---
            'services.view',
            'services.create',
            'services.update',
            'services.delete',

            // --- Inventory Gaun ---
            'gowns.view',
            'gowns.create',
            'gowns.update',
            'gowns.delete',
            'gowns.update_status',

            // --- Booking ---
            'bookings.view_all',
            'bookings.view_assigned',
            'bookings.view_own',
            'bookings.create',
            'bookings.update',
            'bookings.confirm',
            'bookings.reject',
            'bookings.cancel',
            'bookings.reschedule',
            'bookings.assign_staff',
            'bookings.add_internal_note',
            'bookings.override',

            // --- Pembayaran ---
            'payments.view_all',
            'payments.verify',
            'payments.verify_high_value',
            'payments.refund_request',
            'payments.refund_approve',
            'payments.settings',

            // --- Wallet & Loyalty ---
            'wallet.view_own',
            'wallet.view_all',
            'wallet.topup',
            'wallet.adjust',
            'wallet.freeze',

            // --- Laporan ---
            'reports.financial',
            'reports.bookings',
            'reports.inventory',
            'reports.customers',
            'reports.export',

            // --- Konten Website ---
            'content.manage_pages',
            'content.manage_gallery',
            'content.manage_testimonials',
            'content.manage_faq',
            'content.manage_banner',

            // --- Promo & Voucher ---
            'vouchers.view',
            'vouchers.create',
            'vouchers.update',
            'vouchers.delete',

            // --- Notifikasi ---
            'notifications.send_manual',
            'notifications.broadcast',
            'notifications.manage_templates',
            'notifications.view_logs',

            // --- Sistem ---
            'system.settings',
            'system.audit_log',
            'system.backup',
            'system.manage_blocked_dates',
        ];

        // Bikin semua permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $this->command->info('✓ '.count($permissions).' permissions created.');

        // ============================================================
        // 2. BIKIN ROLES
        // ============================================================

        $ownerRole = Role::firstOrCreate(['name' => 'owner', 'guard_name' => 'web']);
        $staffRole = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'web']);
        $customerRole = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);

        $this->command->info('✓ 3 roles created (owner, staff, customer).');

        // ============================================================
        // 3. ASSIGN PERMISSION KE ROLE
        // ============================================================

        // OWNER: dapat SEMUA permission (full access)
        $ownerRole->syncPermissions(Permission::all());
        $this->command->info('✓ Owner role: '.Permission::count().' permissions assigned.');

        // STAFF: permission operasional (tidak termasuk finance, system, content management)
        $staffPermissions = [
            // User (lihat doang)
            'users.view',

            // Layanan (lihat doang)
            'services.view',

            // Gaun (lihat + update status)
            'gowns.view',
            'gowns.update_status',

            // Booking (operasional)
            'bookings.view_all',
            'bookings.view_assigned',
            'bookings.create',
            'bookings.update',
            'bookings.confirm',
            'bookings.reject',
            'bookings.cancel',
            'bookings.reschedule',
            'bookings.add_internal_note',

            // Pembayaran (verif tapi tidak high-value, tidak refund)
            'payments.view_all',
            'payments.verify',
            'payments.refund_request',

            // Voucher (lihat doang)
            'vouchers.view',

            // Notifikasi (manual ke pelanggan)
            'notifications.send_manual',
        ];

        $staffRole->syncPermissions($staffPermissions);
        $this->command->info('✓ Staff role: '.count($staffPermissions).' permissions assigned.');

        // CUSTOMER: permission terbatas (cuma yang berkaitan dengan diri sendiri)
        $customerPermissions = [
            'bookings.view_own',
            'bookings.create',
            'wallet.view_own',
            'wallet.topup',
            'payments.refund_request',
        ];

        $customerRole->syncPermissions($customerPermissions);
        $this->command->info('✓ Customer role: '.count($customerPermissions).' permissions assigned.');

        // ============================================================
        // SELESAI
        // ============================================================

        $this->command->info('');
        $this->command->info('✅ Role & Permission seeding complete!');
        $this->command->info('   Total permissions: '.Permission::count());
        $this->command->info('   Total roles: '.Role::count());
    }
}
