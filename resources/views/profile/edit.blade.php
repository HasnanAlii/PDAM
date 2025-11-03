<x-admin-layout>
  <div class="p-8">
    <h2 class="font-bold text-2xl text-gray-800 mb-6 flex items-center gap-2">
        <x-lucide-user class="w-6 h-6 text-blue-700" />
        {{ __('Profil Pengguna') }}
    </h2>

    <div class="space-y-8 max-w-5xl">
        <!-- 🔹 Update Informasi Profil -->
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                {{ __('Informasi Profil') }}
            </h3>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- 🔹 Ganti Kata Sandi -->
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                {{ __('Ganti Kata Sandi') }}
            </h3>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- 🔹 Hapus Akun -->
        <div class="bg-white shadow-md rounded-2xl p-6 border border-red-200">
            <h3 class="text-lg font-semibold text-red-600 mb-4 border-b pb-2">
                {{ __('Hapus Akun') }}
            </h3>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
