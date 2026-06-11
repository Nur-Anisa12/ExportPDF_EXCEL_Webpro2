<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nura Siakad</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8fafc;
            /* Polos & Bersih */
            font-family: 'Inter', sans-serif;
        }

        .navy-brand {
            color: #0f1e35;
        }

        .bg-navy {
            background-color: #0f1e35;
        }

        .input-focus:focus {
            border-color: #1a4fad;
            box-shadow: 0 0 0 4px rgba(26, 79, 173, 0.1);
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div
            class="max-w-4xl w-full grid md:grid-cols-2 bg-white rounded-[32px] shadow-2xl shadow-slate-200/60 overflow-hidden border border-slate-100">

            {{-- Bagian Kiri: Info Panel (Navy) --}}
            <div class="bg-navy p-10 md:p-12 text-white flex flex-col justify-between relative overflow-hidden">
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-12">
                        <div
                            class="w-10 h-10 bg-[#1a4fad] rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/20">
                            <svg class="w-6 h-6 text-[#93b8f5]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-white">Nura <span
                                class="text-[#5d9cf5]">Akademik</span></span>
                    </div>

                    <h2 class="text-3xl font-bold leading-tight mb-4">Sistem Informasi Akademik Terpadu</h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">Kelola data mahasiswa, kurikulum, dan jadwal
                        akademik dalam satu platform terintegrasi.</p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <i class="ph-fill ph-check-circle text-[#38c9a0] text-lg"></i>
                            Manajemen data mahasiswa & jurusan
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <i class="ph-fill ph-check-circle text-[#38c9a0] text-lg"></i>
                            Pengelolaan mata kuliah & KRS
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <i class="ph-fill ph-check-circle text-[#38c9a0] text-lg"></i>
                            Laporan akademik real-time
                        </div>
                    </div>
                </div>

                {{-- Statistik Singkat --}}
                <div class="grid grid-cols-3 gap-4 mt-12 relative z-10">
                    <div class="bg-white/5 border border-white/10 p-3 rounded-2xl">
                        <div class="text-xl font-bold text-white">1.2k+</div>
                        <div class="text-[10px] text-slate-400 uppercase tracking-wider">Mahasiswa</div>
                    </div>
                    <div class="bg-white/5 border border-white/10 p-3 rounded-2xl">
                        <div class="text-xl font-bold text-white">48</div>
                        <div class="text-[10px] text-slate-400 uppercase tracking-wider">Matkul</div>
                    </div>
                    <div class="bg-white/5 border border-white/10 p-3 rounded-2xl">
                        <div class="text-xl font-bold text-white">12</div>
                        <div class="text-[10px] text-slate-400 uppercase tracking-wider">Jurusan</div>
                    </div>
                </div>

                {{-- Hiasan Background --}}
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl"></div>
            </div>

            {{-- Bagian Kanan: Form Login --}}
            <div class="p-10 md:p-12 flex flex-col justify-center bg-white">
                <div class="mb-8 text-center md:text-left">
                    <h3 class="text-2xl font-bold text-slate-800">Masuk ke sistem</h3>
                </div>

                {{-- Alert Error --}}
                @if (session()->has('loginError'))
                    <div
                        class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl flex items-center gap-3 text-red-700">
                        <i class="ph-fill ph-warning-circle text-xl"></i>
                        <p class="text-xs font-semibold">{{ session('loginError') }}</p>
                    </div>
                @endif

                <form action="/login" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Alamat
                            Email</label>
                        <div class="relative group">
                            <i
                                class="ph ph-envelope-simple absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl group-focus-within:text-[#1a4fad] transition-colors"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none input-focus transition-all text-sm"
                                placeholder="email@mail.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2 ml-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Kata Sandi</label>
                            <a href="#" class="text-xs font-semibold text-[#1a4fad] hover:underline">Lupa
                                sandi?</a>
                        </div>
                        <div class="relative group">
                            <i
                                class="ph ph-lock-key absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl group-focus-within:text-[#1a4fad] transition-colors"></i>
                            <input type="password" name="password" required
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none input-focus transition-all text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center px-1">
                        <input type="checkbox" id="remember"
                            class="w-4 h-4 rounded border-slate-300 text-[#1a4fad] focus:ring-[#1a4fad]">
                        <label for="remember" class="ml-2 text-sm text-slate-600 font-medium cursor-pointer">Ingat
                            saya</label>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#1a4fad] hover:bg-[#154191] text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all transform active:scale-[0.98] flex items-center justify-center gap-2 mt-4 uppercase tracking-widest text-xs">
                        Masuk ke sistem
                        <i class="ph-bold ph-arrow-right"></i>
                    </button>
                </form>

                <p class="mt-10 text-center text-slate-400 text-[11px] font-medium tracking-wide">
                    &copy; 2026 NURA AKADEMIK
                </p>
            </div>
        </div>
    </div>
</body>

</html>
