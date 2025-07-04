<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>Register - Sistem PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #072ac8;
            color: white;
            background-attachment: fixed;
        }

        /* Efek masuk dari atas, lebih lambat */
        .fade-in-down {
            animation: fadeInDown 4s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

       /* Efek cahaya lembut berdenyut, tanpa scale */
        .soft-glow {
            animation: softGlow 5s ease-in-out infinite;
        }

        @keyframes softGlow {
            0%, 100% {
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.15);
            }
            50% {
                box-shadow: 0 0 25px rgba(255, 255, 255, 0.25);
            }
        }
    </style>
    @include('layouts.styles')
</head>
<body class="min-h-screen flex items-center justify-center bg-[#072ac8] bg-no-repeat text-gray-800 px-4">

    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 fade-in-down soft-glow" data-aos="fade-up" data-aos-duration="1000">
        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-700">Selamat Datang</h2>
            <p class="font-semibold text-gray-700">Sistem Penerimaan Peserta Didik Baru</p>
        </div>

        <h4 class="text-center text-xl font-semibold mb-4 text-blue-600">Registrasi Akun</h4>

        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-10">
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-10">
                    <button type="button" onclick="togglePasswordConfirmation()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
                        <svg id="eyeIconConfirmation" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <button 
                type="submit" 
                class="w-full bg-[#072ac8] hover:bg-[#051f9c] text-white py-2 rounded-md font-semibold transition duration-200"
                >
                Daftar
            </button>

            <hr class="my-6 border-t border-gray-300">

            <div class="text-center text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="hover:underline text-blue-700 font-semibold">Login di sini</a>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>

    <!-- Script Toggle Eye -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
    
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7
                          a9.956 9.956 0 012.22-3.592m1.343-1.342A9.955 9.955 0 0112 5c4.477 0
                          8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.045M15 12a3 3 0 11-6 0
                          3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3l18 18" />
                `;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                          9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    
        function togglePasswordConfirmation() {
            const passwordInput = document.getElementById("password_confirmation");
            const eyeIcon = document.getElementById("eyeIconConfirmation");
    
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268 2.943-9.542-7
                          a9.956 9.956 0 012.22-3.592m1.343-1.342A9.955 9.955 0 0112 5c4.477 0
                          8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.045M15 12a3 3 0 11-6 0
                          3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3l18 18" />
                `;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                          9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>    
</body>
</html>