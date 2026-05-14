<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class OwnerSeeder extends Seeder
{
    /**
     * Bikin akun Owner pertama Sophia Bridal.
     *
     * Credentials diambil dari .env (OWNER_EMAIL, OWNER_PASSWORD).
     * Owner cuma boleh 1 — kalau sudah ada, skip.
     */
    public function run(): void
    {
        // Pastikan role 'owner' sudah ada (harusnya udah dari RolePermissionSeeder)
        $ownerRole = Role::where('name', 'owner')->first();

        if (! $ownerRole) {
            $this->command->error('❌ Role "owner" tidak ditemukan!');
            $this->command->warn('   Jalankan RolePermissionSeeder dulu: php artisan db:seed --class=RolePermissionSeeder');

            return;
        }

        // Cek apakah Owner sudah ada (cuma boleh 1)
        $existingOwner = User::role('owner')->first();

        if ($existingOwner) {
            $this->command->warn('⚠  Owner sudah ada: '.$existingOwner->email);
            $this->command->info('   Skip pembuatan Owner.');

            return;
        }

        // Ambil credentials dari .env
        $email = env('OWNER_EMAIL');
        $password = env('OWNER_PASSWORD');
        $name = env('OWNER_NAME', 'Owner Sophia Bridal');
        $phone = env('OWNER_PHONE');

        if (! $email || ! $password) {
            $this->command->error('❌ OWNER_EMAIL atau OWNER_PASSWORD tidak ada di .env!');
            $this->command->warn('   Tambahkan di .env:');
            $this->command->warn('   OWNER_EMAIL=owner@sophiabridal.test');
            $this->command->warn('   OWNER_PASSWORD=password');

            return;
        }

        // Bikin Owner
        $owner = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            'is_active' => true,
            'must_change_password' => false, // Owner ga perlu ganti password (kecuali mau)
        ]);

        // Assign role owner
        $owner->assignRole('owner');

        $this->command->info('');
        $this->command->info('✅ Owner created!');
        $this->command->info('   Name : '.$owner->name);
        $this->command->info('   Email: '.$owner->email);
        $this->command->info('   Phone: '.$owner->phone);
        $this->command->info('   Role : owner');
        $this->command->info('   Permissions: '.$owner->getAllPermissions()->count());
        $this->command->info('');
        $this->command->warn('   ⚠  Password: pakai yang kamu set di .env (OWNER_PASSWORD)');
    }
}
