<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Nura Akademik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f5f7fa;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d1d9e6;
            border-radius: 4px;
        }

        /* ===== SIDEBAR (Navy) ===== */
        .sidebar {
            background: #0f1e35;
            border-right: 0.5px solid #1e3152;
        }

        .brand-icon {
            background: #1a4fad;
            border-radius: 10px;
        }

        .nav-item {
            transition: background 0.15s, color 0.15s;
        }

        .nav-item.active {
            background: #1a4fad;
            color: #ffffff;
        }

        .nav-item.active svg {
            fill: #93b8f5;
        }

        .nav-item:not(.active):hover {
            background: #1a2d48;
            color: #c8d8ea;
        }

        .nav-item:not(.active):hover svg {
            fill: #5d80a0;
        }

        /* ===== TOPBAR (Putih) ===== */
        .topbar {
            background: #ffffff;
            border-bottom: 0.5px solid #e5e9ef;
        }

        .notif-btn {
            background: #f4f6f9;
            transition: background 0.15s;
        }

        .notif-btn:hover {
            background: #e8ecf2;
        }

        .user-chip {
            background: #f4f6f9;
            transition: background 0.15s;
        }

        .user-chip:hover {
            background: #e8ecf2;
        }

        /* ===== STAT CARDS (Putih) ===== */
        .stat-card {
            background: #ffffff;
            border: 0.5px solid #e5e9ef;
            border-radius: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            border-color: #c0cfe0;
            box-shadow: 0 2px 12px rgba(26, 79, 173, 0.06);
        }

        .stat-icon-blue {
            background: #eef3fc;
        }

        .stat-icon-teal {
            background: #e6f6f1;
        }

        .stat-icon-amber {
            background: #fff6e6;
        }

        .trend-up {
            background: #e8f8f2;
            color: #1d9e75;
        }

        /* ===== BANNER ===== */
        .banner {
            background: #1a4fad;
            border: 0.5px solid #2a5fc2;
            border-radius: 16px;
            overflow: hidden;
        }

        /* ===== ACTIVITY ===== */
        .activity-item {
            background: #ffffff;
            border: 0.5px solid #e5e9ef;
            border-radius: 10px;
            transition: border-color 0.15s;
        }

        .activity-item:hover {
            border-color: #c0cfe0;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen">

        {{-- ===== SIDEBAR (Navy) ===== --}}
        <aside class="sidebar w-56 flex-shrink-0 hidden md:flex flex-col">

            {{-- Brand --}}
            <div class="p-5 border-b border-[#1e3152]">
                <div class="flex items-center gap-3">
                    <div class="brand-icon w-9 h-9 flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#93b8f5]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <span class="text-[15px] font-semibold text-[#e8edf5] tracking-tight">
                        Nura <span class="text-[#5d9cf5]">Akademik</span>
                    </span>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-4 space-y-0.5">
                <p class="text-[10px] font-medium tracking-widest text-[#2e4a65] uppercase px-3 py-2">Menu Utama</p>

                <a href="#"
                    class="nav-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-white">
                    <svg class="w-4 h-4 fill-[#93b8f5]" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                    </svg>
                    Dashboard
                </a>

                <a href="/mahasiswa"
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#3a5570]" viewBox="0 0 24 24">
                        <path
                            d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Data Mahasiswa
                </a>

                <a href="/jurusan"
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#3a5570]" viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Data Jurusan
                </a>

                <a href="/matakuliah"
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#3a5570]" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                    Mata Kuliah
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-3 border-t border-[#1e3152]">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#e06b6b] hover:bg-[rgba(224,107,107,0.08)] transition-colors">
                        <svg class="w-4 h-4 fill-[#e06b6b]" viewBox="0 0 24 24">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar Sistem
                    </button>
                </form>
            </div>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <main class="flex-1 flex flex-col min-w-0">

            {{-- Topbar (Putih) --}}
            <header class="topbar h-14 flex items-center justify-between px-6 flex-shrink-0">
                <div class="text-[13px] text-[#9aa5b4]">
                    Sistem Informasi Akademik
                </div>
                <div class="flex items-center gap-3">
                    {{-- Notif --}}
                    <div class="notif-btn w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer">
                        <svg class="w-4 h-4 text-[#7a8a9a]" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                    </div>
                    {{-- User --}}
                    <div class="user-chip flex items-center gap-2 px-3 py-1.5 rounded-full cursor-pointer">
                        <div
                            class="w-6 h-6 bg-[#1a4fad] rounded-full flex items-center justify-center text-[10px] font-semibold text-[#93b8f5]">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <span
                            class="text-[12px] font-medium text-[#3a4a5c] hidden sm:block">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="flex-1 p-6 overflow-y-auto space-y-5">

                {{-- Welcome --}}
                <div class="flex items-end justify-between">
                    <div>
                        <h1 class="text-[20px] font-semibold text-[#1a2540]">
                            Selamat datang, {{ Auth::user()->name }}! 👋
                        </h1>
                        <p class="text-[13px] text-[#8a96a6] mt-1">
                            Ringkasan sistem informasi akademik hari ini.
                        </p>
                    </div>
                    <div
                        class="text-[11px] text-[#6b7a8d] bg-white px-3 py-1.5 rounded-lg border border-[#e0e5ee] hidden sm:block">
                        Semester Genap 2025/2026
                    </div>
                </div>

                {{-- Stat Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    {{-- Mahasiswa --}}
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="stat-icon-blue w-9 h-9 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#1a4fad]" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <span class="trend-up text-[10px] font-semibold px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <div class="text-[26px] font-bold text-[#1a2540] leading-none">{{ $totalMahasiswa }}</div>
                        <div class="text-[12px] text-[#8a96a6] mt-1.5">Total Mahasiswa</div>
                    </div>

                    {{-- Jurusan --}}
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="stat-icon-teal w-9 h-9 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#1d9e75]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                    <polyline points="9 22 9 12 15 12 15 22" />
                                </svg>
                            </div>
                            <span class="trend-up text-[10px] font-semibold px-2 py-1 rounded-full">+2</span>
                        </div>
                        <div class="text-[26px] font-bold text-[#1a2540] leading-none">{{ $totalJurusan }}</div>
                        <div class="text-[12px] text-[#8a96a6] mt-1.5">Total Jurusan</div>
                    </div>

                    {{-- Mata Kuliah --}}
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="stat-icon-amber w-9 h-9 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#ba7517]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                                </svg>
                            </div>
                            <span class="trend-up text-[10px] font-semibold px-2 py-1 rounded-full">+8</span>
                        </div>
                        <div class="text-[26px] font-bold text-[#1a2540] leading-none">{{ $totalMatakuliah }}</div>
                        <div class="text-[12px] text-[#8a96a6] mt-1.5">Total Mata Kuliah</div>
                    </div>
                </div>

                {{-- Banner CTA --}}
                <div class="banner p-6 relative">
                    <div class="relative z-10">
                        <h2 class="text-[15px] font-semibold text-white">Siap mengelola data akademik?</h2>
                        <p class="text-[12px] text-[#93b8f5] mt-1.5 max-w-sm leading-relaxed">
                            Kelola informasi mahasiswa, jurusan, dan kurikulum dengan lebih terorganisir menggunakan
                            sistem Nura Akademik.
                        </p>
                        <button
                            class="mt-4 bg-white text-[#1a4fad] text-[12px] font-semibold px-5 py-2 rounded-lg hover:bg-blue-50 transition-colors">
                            Lihat Panduan
                        </button>
                    </div>
                    <div class="absolute right-0 bottom-0 opacity-[0.07] pointer-events-none">
                        <svg class="w-40 h-40 fill-white" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                </div>

                {{-- Recent Activity --}}
                <div>
                    <p class="text-[11px] font-semibold tracking-widest text-[#aab2be] uppercase mb-3">Aktivitas
                        Terbaru</p>
                    <div class="space-y-1.5">
                        <div class="activity-item flex items-center gap-3 px-4 py-3">
                            <div class="w-2 h-2 rounded-full bg-[#1a4fad] flex-shrink-0"></div>
                            <p class="text-[12px] text-[#7a8a9a] flex-1">
                                <span class="text-[#2e3e52] font-medium">Mahasiswa baru</span> ditambahkan ke Jurusan
                                Teknik Informatika
                            </p>
                            <span class="text-[11px] text-[#bbc5d0]">2 menit lalu</span>
                        </div>
                        <div class="activity-item flex items-center gap-3 px-4 py-3">
                            <div class="w-2 h-2 rounded-full bg-[#1d9e75] flex-shrink-0"></div>
                            <p class="text-[12px] text-[#7a8a9a] flex-1">
                                <span class="text-[#2e3e52] font-medium">Mata kuliah baru</span> Kecerdasan Buatan
                                berhasil diregistrasi
                            </p>
                            <span class="text-[11px] text-[#bbc5d0]">1 jam lalu</span>
                        </div>
                        <div class="activity-item flex items-center gap-3 px-4 py-3">
                            <div class="w-2 h-2 rounded-full bg-[#ba7517] flex-shrink-0"></div>
                            <p class="text-[12px] text-[#7a8a9a] flex-1">
                                <span class="text-[#2e3e52] font-medium">Data jurusan</span> Sistem Informasi
                                diperbarui oleh admin
                            </p>
                            <span class="text-[11px] text-[#bbc5d0]">3 jam lalu</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>
