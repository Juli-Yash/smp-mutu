<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Sistem PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #072ac8;
            color: white;
            background-attachment: fixed;
        }

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
</head>
<body class="min-h-screen flex items-center justify-center bg-[#072ac8] bg-no-repeat text-gray-800 px-4">

    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 fade-in-down soft-glow"
         data-aos="fade-up"
         data-aos-duration="1000"
    >
        <!-- Judul -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-700">Reset Password</h2>
            <p class="font-semibold text-gray-700">Masukkan email untuk menerima link reset</p>
        </div>

        <!-- Status Sukses -->
        @if (session('status'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded">
                {{ session('status') }}
            </div>
        @endif

        <!-- Error validasi -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Reset -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-6">
                <label class="block text-sm font-medium">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>

            <!-- Tombol Kirim -->
            <button 
                type="submit" 
                class="w-full bg-[#072ac8] hover:bg-[#051f9c] text-white py-2 rounded-md font-semibold transition duration-200"
            >
                Kirim Link Reset Password
            </button>

            <!-- Kembali ke Login -->
            <p class="text-sm text-center mt-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                    Kembali ke Login
                </a>
            </p>
        </form>
    </div>

    <!-- Script AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>