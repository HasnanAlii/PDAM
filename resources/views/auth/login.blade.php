<x-guest-layout>
    <div class="">
        <div class="w-full max-w-md bg-yellow-50 px-6 py-8 rounded-lg shadow-md">

            <!-- Logo & Judul -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-[#004d93]">Login Perumdam Tirta Mukti</h2>
                <p class="text-sm text-gray-700 mt-1">Masukkan email dan password Anda</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6" novalidate>
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full border border-[#fcd34d]/50 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#004d93] focus:border-[#004d93]" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full border border-[#fcd34d]/50 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#004d93] focus:border-[#004d93]" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-[#fcd34d] text-[#004d93] shadow-sm focus:ring-[#004d93]" 
                        name="remember"
                    >
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">{{ __('Ingat Saya') }}</label>
                </div>

                <!-- Actions -->
                <div class="flex justify-center">
                    <x-primary-button class="w-full text-white px-6 py-2 rounded-lg text-center shadow-md transition">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
