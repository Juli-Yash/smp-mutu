<style>
    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.4); opacity: 0.6; }
    }

    .animate-pulse-dot {
        animation: pulse-dot 1.6s infinite;
    }
</style>

<aside class="w-64 bg-gray-900 text-white min-h-screen p-6 shadow-lg border-r border-gray-700">
    <!-- Header -->
    <div class="mb-10 mt-3 text-center">
        <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse-dot"></span>
            Siswa Panel
        </h2>
    </div>

    <!-- Garis Pembatas -->
    <div class="border-t border-gray-700 mb-6"></div>

    <!-- Menu -->
    <ul class="space-y-4 text-[15px] font-medium">
        <li>
            <a href="{{ route('siswa.dashboard') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('siswa.dashboard')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🧭 Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('daftar.create') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('daftar.create')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                📝 Form Pendaftaran
            </a>
        </li>
        <li>
            <a href="{{ route('siswa.status') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('siswa.status')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                📋 Status Pendaftaran
            </a>
        </li>
        <li>
            <a href="{{ route('siswa.hasil') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('siswa.hasil')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                📊 Hasil Seleksi
            </a>
        </li>
        <li>
            <a href="{{ route('siswa.berkas') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('siswa.berkas')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🖨️ Cetak Berkas
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
                class="block py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('profile.edit')
                    ? 'bg-gray-700 font-semibold text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                ⚙️ Profil
            </a>
        </li>
    </ul>
</aside>