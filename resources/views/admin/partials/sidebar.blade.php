<style>
    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.4); opacity: 0.6; }
    }

    .animate-pulse-dot {
        animation: pulse-dot 1.6s infinite;
    }
</style>

<div class="h-full p-6 text-gray-800 md:text-white md:bg-gray-900 border-b md:border-b-0 md:border-r border-gray-300 md:border-gray-700">
    <!-- Logo / Header -->
    <div class="mb-10 mt-3 text-center">
        <h2 class="text-2xl font-bold flex items-center justify-center gap-2">
            <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse-dot"></span>
            Admin Panel
        </h2>
    </div>

    <!-- Garis Pembatas -->
    <div class="border-t border-gray-700 mb-6"></div>

    <!-- Menu -->
    <ul class="space-y-3 text-[15px] font-medium">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🧭 Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.hasil') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.hasil') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                👥 Data Calon Siswa
            </a>
        </li>
        <li>
            <a href="{{ route('admin.data-user.index') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.data-user.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🧑‍💼 Data User
            </a>
        </li>
        <li>
            <a href="{{ route('admin.jadwal.index') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.jadwal.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🗓️ Jadwal PPDB
            </a>
        </li>
        <li>
            <a href="{{ route('admin.informasi.index') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.informasi.index') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                📢 Informasi Sekolah
            </a>
        </li>
        <li>
            <a href="{{ route('admin.laporan') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('admin.laporan') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                🧾 Cetak Laporan
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
               class="block py-2 px-4 rounded transition-all duration-300 
               {{ request()->routeIs('profile.edit') ? 'bg-gray-700 font-semibold text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                ⚙️ Profil
            </a>
        </li>
    </ul>
</div>