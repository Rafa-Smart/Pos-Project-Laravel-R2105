<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS Admin Register | Modern Design</title>
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!-- Configure Tailwind for custom theme -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4f46e5', // Indigo 600
                        'primary-dark': '#4338ca', // Indigo 700
                        'background-soft': '#f3f4f6', // Gray 100
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
                    }
                },
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* Custom styles for smoother transitions and subtle look */
        .register-card-container {
            width: 100%;
            max-width: 480px; /* Slightly wider for more inputs */
        }
        /* Style for Floating Labels and Icons */
        .input-icon-wrapper input {
            padding-left: 3rem !important; /* Space for the icon */
        }
        .input-icon {
            pointer-events: none;
            left: 0.75rem; /* Icon position */
        }
        .input-icon-wrapper input:focus + .input-icon {
            color: var(--tw-colors-primary);
        }
        /* Button Style matching Login */
        .btn-primary-custom {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary-custom:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.5), 0 4px 6px -4px rgba(79, 70, 229, 0.1);
        }
    </style>
</head>

<body class="bg-background-soft font-sans flex items-center justify-center min-h-screen p-4">

    <!-- Register Container Card -->
    <div class="register-card-container bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 md:p-10 p-6">
        
        <!-- Header / Title Area -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">
                Daftar Akun <span class="text-primary">POS</span>
            </h1>
            <p class="mt-2 text-gray-500 text-lg">Siap mengelola bisnis Anda? Isi detail di bawah.</p>
        </div>

        <!-- Notification/Error Message Area (Simulated) -->
        <!-- PHP error handling is simulated here with a cleaner alert design -->
        <!-- @if($errors->any()) -->
        <div class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert" id="errorMessage">
            <div class="flex items-center">
                <i class="bi bi-exclamation-triangle-fill mr-3"></i>
                <p class="text-sm font-medium">
                    <!-- {{ $errors->first() }} -->
                    Pendaftaran gagal. Pastikan semua kolom terisi dengan benar.
                </p>
            </div>
        </div>
        <!-- @endif -->

        <!-- REGISTRATION FORM -->
        <form action="#" method="POST" id="registerForm">
            <!-- @csrf is excluded as this is a static client-side file -->

            <!-- Full Name Input Group -->
            <div class="mb-5 relative input-icon-wrapper">
                <input
                    id="name"
                    name="name"
                    type="text"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                    value=""
                    required
                    autocomplete="name"
                    placeholder=" "
                />
                <label for="name" class="absolute top-1/2 -translate-y-1/2 left-12 text-gray-500 pointer-events-none transition-all duration-150 ease-in-out transform origin-top-left 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-7 peer-focus:scale-75 peer-focus:text-primary">
                    Nama Lengkap
                </label>
                <!-- Icon Positioned Absolutely -->
                <i class="bi bi-person absolute top-1/2 transform -translate-y-1/2 text-gray-400 input-icon text-xl"></i>
            </div>

            <!-- Email Input Group -->
            <div class="mb-5 relative input-icon-wrapper">
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                    value=""
                    required
                    autocomplete="email"
                    placeholder=" "
                />
                <label for="email" class="absolute top-1/2 -translate-y-1/2 left-12 text-gray-500 pointer-events-none transition-all duration-150 ease-in-out transform origin-top-left 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-7 peer-focus:scale-75 peer-focus:text-primary">
                    Alamat Email
                </label>
                <!-- Icon Positioned Absolutely -->
                <i class="bi bi-envelope absolute top-1/2 transform -translate-y-1/2 text-gray-400 input-icon text-xl"></i>
            </div>
            
            <!-- Password Input Group -->
            <div class="mb-6 relative input-icon-wrapper">
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                    required
                    autocomplete="new-password"
                    placeholder=" "
                />
                <label for="password" class="absolute top-1/2 -translate-y-1/2 left-12 text-gray-500 pointer-events-none transition-all duration-150 ease-in-out transform origin-top-left
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-7 peer-focus:scale-75 peer-focus:text-primary">
                    Kata Sandi
                </label>
                <!-- Icon Positioned Absolutely -->
                <i class="bi bi-lock-fill absolute top-1/2 transform -translate-y-1/2 text-gray-400 input-icon text-xl"></i>
            </div>

            <!-- Register Button -->
            <div class="flex justify-center">
                <button 
                    type="submit" 
                    class="btn-primary-custom w-full max-w-sm bg-primary text-white font-semibold py-3 px-4 rounded-full hover:bg-primary-dark focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50 transition duration-300 ease-in-out"
                >
                    Daftar Sekarang
                </button>
            </div>
        </form>

        <!-- Footer / Login Link -->
        <div class="mt-8 text-center text-gray-500">
            <p class="text-sm">
                Sudah punya akun?
                <a href="/" class="text-primary hover:text-primary-dark font-medium transition duration-150">Masuk ke Akun Anda</a>
            </p>
        </div>

    </div>
    
    <!-- Script for simulation (Optional) -->
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Simulate form submission success/failure
            const email = document.getElementById('email').value;
            const errorBox = document.getElementById('errorMessage');

            if (email.includes('error')) {
                errorBox.classList.remove('hidden');
                setTimeout(() => errorBox.classList.add('hidden'), 5000); // Hide after 5 seconds
            } else {
                console.log('Registration attempt successful.');
                alert('Simulasi: Pendaftaran berhasil! Silakan masuk.');
                // In a real app, this would redirect to the login page or dashboard
            }
        });
        
        // Ensure Inter font is ready
        if ('fonts' in document) {
            document.fonts.load('1rem Inter');
        }
    </script>
</body>
</html>