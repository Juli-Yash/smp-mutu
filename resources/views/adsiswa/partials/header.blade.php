<div class="flex items-center justify-between w-full px-4 py-3 md:px-6">
    <h1 class="text-sm md:text-3xl font-extrabold max-w-[calc(100%-8rem)] md:max-w-full">
        SISTEM PPDB SMP MUHAMMADIYAH 1 ROWOKELE
    </h1>
    <div class="flex items-center ml-3">
        <div class="relative flex-shrink-0">
            <button
                id="dropdownToggle"
                class="flex items-center text-sm bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded-lg focus:outline-none"
                aria-haspopup="true" aria-expanded="false" aria-controls="dropdownMenu">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="ml-2 hidden md:inline">{{ Auth::user()->name ?? 'User' }}</span>
                <svg class="w-4 h-4 ml-1 transform transition-transform duration-200"
                     id="dropdownArrow"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div
                id="dropdownMenu"
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 translate-y-2 pointer-events-none transition-all duration-300 ease-out z-50 origin-top-right"
                role="menu" aria-labelledby="dropdownToggle">
                <div class="py-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                        Profil
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form-mobile" class="block md:hidden">
                        @csrf
                        <button type="button"
                                onclick="confirmLogout('logout-form-mobile')"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700"
                                role="menuitem">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="hidden md:block ml-3">
            @csrf
            <button type="button"
                    onclick="confirmLogout()"
                    class="flex items-center text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg focus:outline-none">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1"></path>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("dropdownToggle");
        const menu = document.getElementById("dropdownMenu");
        const arrow = document.getElementById("dropdownArrow");

        function openDropdown() {
            menu.classList.remove("opacity-0", "translate-y-2", "pointer-events-none");
            toggle.setAttribute("aria-expanded", "true");
            arrow.classList.add("rotate-180");
        }

        function closeDropdown() {
            menu.classList.add("opacity-0", "translate-y-2", "pointer-events-none");
            toggle.setAttribute("aria-expanded", "false");
            arrow.classList.remove("rotate-180");
        }

        toggle.addEventListener("click", function (e) {
            e.stopPropagation();
            if (menu.classList.contains("opacity-0")) {
                openDropdown();
            } else {
                closeDropdown();
            }
        });

        document.addEventListener("click", function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                closeDropdown();
            }
        });
    });
</script>