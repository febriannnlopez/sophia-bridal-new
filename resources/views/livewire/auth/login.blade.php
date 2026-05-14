<x-layouts::auth :title="__('Log in')">
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Selamat Datang Kembali')"
            :description="__('Masuk ke akun Anda untuk lanjutkan pemesanan')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Alamat Email')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@contoh.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password Anda')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0 !text-bridal-primary hover:!text-bridal-primary-dark" :href="route('password.request')" wire:navigate>
                        {{ __('Lupa password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Ingat saya')" :checked="old('remember')" />

            <div class="flex items-center justify-end mt-2">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Masuk') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-bridal-secondary">
                <span>{{ __('Belum punya akun?') }}</span>
                <flux:link :href="route('register')" wire:navigate class="!text-bridal-primary hover:!text-bridal-primary-dark">{{ __('Daftar di sini') }}</flux:link>
            </div>
        @endif
    </div>
</x-layouts::auth>
