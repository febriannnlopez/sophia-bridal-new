<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kontak & profil
            $table->string('phone', 20)->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('address');
            $table->enum('gender', ['male', 'female'])->nullable()->after('birth_date');
            $table->string('avatar')->nullable()->after('gender');

            // Status akun
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->boolean('must_change_password')->default(false)->after('is_active');

            // Audit
            $table->timestamp('last_login_at')->nullable()->after('must_change_password');
            $table->string('last_login_ip', 45)->nullable()->after('last_login_at');

            // Index untuk performance
            $table->index('is_active');
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['phone']);

            $table->dropColumn([
                'phone',
                'address',
                'birth_date',
                'gender',
                'avatar',
                'is_active',
                'must_change_password',
                'last_login_at',
                'last_login_ip',
            ]);
        });
    }
};
