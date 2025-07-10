<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | Kepala Sekolah')</title>
        
    @stack('add-styles')
    @include('adkepsek.partials.scripts')
    @include('adkepsek.partials.styles')
        
</head>
<body class="bg-gray-100 text-gray-800" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-30 w-72 bg-white shadow-md overflow-y-auto transform md:translate-x-0 transition-transform duration-300 ease-in-out"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            @include('adkepsek.partials.sidebar')
        </aside>

        <!-- Overlay (untuk mobile) -->
        <div
            class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden"
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            x-transition.opacity>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen md:ml-72">
            <!-- Header -->
            <header class="bg-white shadow-md p-4 sticky top-0 z-10 flex items-center justify-between">
                <!-- Hamburger (tampil di mobile) -->
                <button
                    class="md:hidden text-gray-600 focus:outline-none"
                    @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                @include('adkepsek.partials.header')
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto pt-0 px-4">

                <div class="overflow-x-auto">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white text-center text-sm text-gray-500 p-4 border-t">
                @include('adkepsek.partials.footer')
            </footer>
        </div>
    </div>
    @stack('scripts')
</body>
</html>