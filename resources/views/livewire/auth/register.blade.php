<x-layouts::auth :title="__('Register')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Buat Akun Baru')"
            :description="__('Daftar untuk pesan layanan & gaun Sophia Bridal')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Name -->
            <flux:input
                name="name"
                :label="__('Nama Lengkap')"
                :value="old('name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                placeholder="Contoh: Sarah Wijaya"
            />

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Alamat Email')"
                :value="old('email')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@contoh.com"
            />

            <!-- Phone (NEW) -->
            <flux:input
                name="phone"
                :label="__('Nomor WhatsApp')"
                :value="old('phone')"
                type="tel"
                autocomplete="tel"
                placeholder="08123456789"
                description="Kami akan mengirim notifikasi & pengingat lewat WA"
            />

            <!-- Password -->
            <flux:input
                name="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Minimal 8 karakter')"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                name="password_confirmation"
                :label="__('Konfirmasi Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Ketik ulang password')"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <div class="flex items-center justify-end mt-2">
                <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                    {{ __('Daftar Sekarang') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-bridal-secondary">
            <span>{{ __('Sudah punya akun?') }}</span>
            <flux:link :href="route('login')" wire:navigate class="!text-bridal-primary hover:!text-bridal-primary-dark">{{ __('Masuk di sini') }}</flux:link>
        </div>
    </div>
</x-layouts::auth>
