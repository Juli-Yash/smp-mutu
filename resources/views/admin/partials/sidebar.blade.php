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
    <!-- Logo / Header -->
    <div class="mb-10 mt-3 text-center">
        <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse-dot"></span>
            Admin Panel
        </h2>
    </div>

    <div class="border-t border-gray-700 mb-6"></div>

    <!-- Menu -->
    <ul class="space-y-3 text-[15px] font-medium">

        <!-- Dashboard -->
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>
        </li>

        <!-- Data Calon Siswa -->
        <li x-data="{ open: {{ request()->routeIs('admin.hasil') || request()->routeIs('admin.pendaftar.edit') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between py-2 px-4 rounded transition-all duration-300
                {{ request()->routeIs('admin.hasil') || request()->routeIs('admin.pendaftar.edit') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <div class="flex items-center gap-x-2 min-w-0">
                    <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path d="M7 14a4 4 0 00-4 4v1a1 1 0 001 1h5.26a6.52 6.52 0 01-.26-1.8c0-1.07.25-2.09.7-3H4zm10 0c-1.16 0-2.24.41-3.1 1.1a6.52 6.52 0 012.1 4.7c0 .61-.09 1.21-.26 1.8H21a1 1 0 001-1v-1a4 4 0 00-4-4h-1zm-5-1a3 3 0 100-6 3 3 0 000 6zm7-2a2 2 0 100-4 2 2 0 000 4zm-12 0a2 2 0 100-4 2 2 0 000 4z"/>
                    </svg>
                    <span class="whitespace-nowrap overflow-hidden">Data Calon Siswa</span>
                </div>
                <svg class="w-5 h-5 transform transition-transform duration-300 flex-shrink-0"
                     :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <ul x-show="open" x-transition class="ml-6 mt-2 space-y-2 text-sm">
                <li>
                    <a href="{{ route('admin.hasil') }}"
                       class="block py-2 px-4 rounded 
                       {{ request()->routeIs('admin.hasil') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Daftar Calon Siswa
                    </a>
                </li>
                @if(request()->routeIs('admin.pendaftar.edit'))
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 font-semibold text-white">
                        Edit Data
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <!-- Data User -->
        <li x-data="{ open: {{ request()->is('admin/data-user*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between py-2 px-4 rounded transition-all duration-300
                {{ request()->is('admin/data-user*') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <div class="flex items-center gap-x-2 min-w-0">
                    <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A4.992 4.992 0 014 14V9a4 4 0 014-4h8a4 4 0 014 4v5a4.992 4.992 0 01-1.121 3.804M12 14v6"/>
                    </svg>
                    <span class="truncate whitespace-nowrap overflow-hidden">Data User</span>
                </div>
                <svg class="w-5 h-5 transform transition-transform duration-300 flex-shrink-0"
                     :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <ul x-show="open" x-transition class="ml-6 mt-2 space-y-2 text-sm">
                <li>
                    <a href="{{ route('admin.data-user.index') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.data-user.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Daftar User
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.data-user.create') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.data-user.create') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Tambah User
                    </a>
                </li>
                @if(request()->routeIs('admin.data-user.edit'))
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 font-semibold text-white">
                        Edit User
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <!-- Jadwal PPDB -->
        <li x-data="{ open: {{ request()->is('admin/jadwal*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between py-2 px-4 rounded transition-all duration-300
                {{ request()->is('admin/jadwal*') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <div class="flex items-center gap-x-2 min-w-0">
                    <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7V3M16 7V3M3 11h18M5 19h14a2 2 0 002-2V7H3v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="truncate whitespace-nowrap overflow-hidden">Jadwal PPDB</span>
                </div>
                <svg class="w-5 h-5 transform transition-transform duration-300 flex-shrink-0"
                     :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <ul x-show="open" x-transition class="ml-6 mt-2 space-y-2 text-sm">
                <li>
                    <a href="{{ route('admin.jadwal.index') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.jadwal.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Daftar Jadwal
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jadwal.create') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.jadwal.create') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Tambah Jadwal
                    </a>
                </li>
                @if(request()->routeIs('admin.jadwal.edit'))
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 font-semibold text-white">
                        Edit Jadwal
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <!-- Informasi Sekolah -->
        <li x-data="{ open: {{ request()->is('admin/informasi*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between py-2 px-4 rounded transition-all duration-300
                {{ request()->is('admin/informasi*') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <div class="flex items-center gap-x-2 min-w-0">
                    <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0l-8 8-8-8"/>
                    </svg>
                    <span class="truncate whitespace-nowrap overflow-hidden">Informasi Sekolah</span>
                </div>
                <svg class="w-5 h-5 transform transition-transform duration-300 flex-shrink-0"
                     :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <ul x-show="open" x-transition class="ml-6 mt-2 space-y-2 text-sm">
                <li>
                    <a href="{{ route('admin.informasi.index') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.informasi.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Daftar Informasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.informasi.create') }}"
                       class="block py-2 px-4 rounded
                       {{ request()->routeIs('admin.informasi.create') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Tambah Informasi
                    </a>
                </li>
                @if(request()->routeIs('admin.informasi.edit'))
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 font-semibold text-white">
                        Edit Informasi
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <!-- Cetak Laporan -->
        <li>
            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-2 py-2 px-4 rounded transition-all duration-300
               {{ request()->routeIs('admin.laporan') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 17v-1h6v1M5 8h14M17 4H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Cetak Laporan
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