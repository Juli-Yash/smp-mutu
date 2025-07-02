<div class="flex items-center justify-between w-full px-4 py-3 md:px-6">
    <!-- Judul -->
    <h1 class="text-lg md:text-3xl font-extrabold truncate max-w-[70vw] md:max-w-full">
        SISTEM PPDB SMP MUHAMMADIYAH 1 ROWOKELE
    </h1>    

    <!-- Profil & Logout Dropdown -->
    <div class="relative flex-shrink-0 ml-3">
        <button
            id="dropdownToggle"
            class="flex items-center text-sm bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded focus:outline-none"
            aria-haspopup="true" aria-expanded="false" aria-controls="dropdownMenu">
            <span class="ml-2 hidden md:inline">{{ Auth::user()->name ?? 'User' }}</span>
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div
            id="dropdownMenu"
            class="absolute right-0 mt-2 min-w-[8rem] bg-white border border-gray-200 rounded shadow-lg hidden z-50"
            role="menu" aria-labelledby="dropdownToggle">
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="block">
                @csrf
                <button type="button"
                        onclick="confirmLogout()"
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                        role="menuitem">
                        Keluar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("dropdownToggle");
        const menu = document.getElementById("dropdownMenu");

        toggle.addEventListener("click", function (e) {
            e.stopPropagation();
            menu.classList.toggle("hidden");

            // Update ARIA expanded
            const expanded = toggle.getAttribute("aria-expanded") === "true";
            toggle.setAttribute("aria-expanded", String(!expanded));
        });

        document.addEventListener("click", function (e) {
            if (!toggle.contains(e.target)) {
                menu.classList.add("hidden");
                toggle.setAttribute("aria-expanded", "false");
            }
        });
    });
</script>