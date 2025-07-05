<style>
    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.4); opacity: 0.6; }
    }

    .animate-pulse-dot {
        animation: pulse-dot 1.6s infinite;
    }
</style>

<aside class="w-72 bg-gray-900 text-white min-h-screen p-6 shadow-lg border-r border-gray-700">
    <!-- Header -->
    <div class="mb-10 mt-3 text-center">
        <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse-dot"></span>
            Siswa Panel
        </h2>
    </div>

    <div class="border-t border-gray-700 mb-6"></div>

    <!-- Menu -->
    <ul class="space-y-3 text-[15px] font-medium">

        <!-- Dashboard -->
        <li>
            <a href="{{ route('siswa.dashboard') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('siswa.dashboard') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>
        </li>

        <!-- Form Pendaftaran -->
        <li>
            <a href="{{ route('daftar.create') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('daftar.create') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Form Pendaftaran
            </a>
        </li>

        <!-- Status Pendaftaran -->
        <li>
            <a href="{{ route('siswa.status') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('siswa.status') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16h8M8 12h8m-8-4h8M4 6h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Status Pendaftaran
            </a>
        </li>

        <!-- Hasil Seleksi -->
        <li>
            <a href="{{ route('siswa.hasil') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('siswa.hasil') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 17l-5-5m0 0l5-5m-5 5h12"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Hasil Seleksi
            </a>
        </li>

        <!-- Cetak Berkas -->
        <li>
            <a href="{{ route('siswa.berkas') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('siswa.berkas') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 17v-1h6v1M5 8h14M17 4H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Cetak Berkas
            </a>
        </li>

        <!-- Profil -->
        <li>
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('profile.edit') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4a4 4 0 100 8 4 4 0 000-8zM4 20v-1a4 4 0 014-4h8a4 4 0 014 4v1"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Profil
            </a>
        </li>
    </ul>
</aside>