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
    <div class="mb-10 mt-3 text-center">
        <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse-dot"></span>
            Kepsek Panel
        </h2>
    </div>

    <div class="border-t border-gray-700 mb-6"></div>

    <ul class="space-y-3 text-[15px] font-medium">

        <li class="text-gray-400 text-xs uppercase tracking-wider font-semibold mt-6 mb-2">
            Halaman Utama
        </li>
        <li>
            <a href="{{ route('kepsek.dashboard') }}"
               class="flex items-center gap-2 py-2 pl-4 pr-4 rounded transition-all duration-300
               {{ request()->routeIs('kepsek.dashboard') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>
        </li>

        <div class="border-t border-gray-700 my-4"></div>

        <li class="text-gray-400 text-xs uppercase tracking-wider font-semibold mt-6 mb-2">
            Manajemen Data PPDB
        </li>
        <li>
            <a href="{{ route('kepsek.hasil') }}"
               class="flex items-center gap-2 py-2 pl-4 pr-4 rounded transition-all duration-300
               {{ request()->routeIs('kepsek.hasil') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 14a4 4 0 00-4 4v1a1 1 0 001 1h5.26a6.52 6.52 0 01-.26-1.8c0-1.07.25-2.09.7-3H4zm10 0c-1.16 0-2.24.41-3.1 1.1a6.52 6.52 0 012.1 4.7c0 .61-.09 1.21-.26 1.8H21a1 1 0 001-1v-1a4 4 0 00-4-4h-1zm-5-1a3 3 0 100-6 3 3 0 000 6zm7-2a2 2 0 100-4 2 2 0 000 4zm-12 0a2 2 0 100-4 2 2 0 000 4z"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Data Calon Siswa
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.laporan') }}"
               class="flex items-center gap-2 py-2 pl-4 pr-4 rounded transition-all duration-300
               {{ request()->routeIs('kepsek.laporan') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 17v-1h6v1M5 8h14M17 4H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Cetak Laporan
            </a>
        </li>

        <div class="border-t border-gray-700 my-4"></div>

        <li class="text-gray-400 text-xs uppercase tracking-wider font-semibold mt-6 mb-2">
            Pengaturan Akun
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-2 py-2 pl-4 pr-4 rounded transition-all duration-300
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