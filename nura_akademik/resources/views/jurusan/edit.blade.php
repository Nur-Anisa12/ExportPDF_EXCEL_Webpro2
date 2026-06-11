<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurusan - Nura Akademik</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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

        /* ===== TOPBAR & CARDS ===== */
        .topbar {
            background: #ffffff;
            border-bottom: 0.5px solid #e5e9ef;
        }

        .main-card {
            background: #ffffff;
            border: 0.5px solid #e5e9ef;
            border-radius: 14px;
        }

        /* ===== FORM STYLING ===== */
        .input-field {
            background: #f8fafc;
            border: 1px solid #e5e9ef;
            transition: all 0.2s ease;
        }

        .input-field:focus {
            background: #ffffff;
            border-color: #1a4fad;
            box-shadow: 0 0 0 4px rgba(26, 79, 173, 0.05);
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen">

        {{-- ===== SIDEBAR (Navy) ===== --}}
        <aside class="sidebar w-56 flex-shrink-0 hidden md:flex flex-col">
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

                <a href="dashboard"
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#3a5570]" viewBox="0 0 24 24">
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
                    class="nav-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#93b8f5]" viewBox="0 0 24 24">
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

            {{-- Topbar --}}
            <header class="topbar h-14 flex items-center justify-between px-6 flex-shrink-0">
                <div class="flex items-center gap-2 text-[13px] text-[#9aa5b4]">
                    <span>Data Jurusan</span>
                    <i class="ph ph-caret-right text-[10px]"></i>
                    <span class="text-[#3a4a5c] font-medium">Edit Jurusan</span>
                </div>

                {{-- Button Kembali di Pojok Navbar (Sama dengan halaman Tambah) --}}
                <a href="/jurusan"
                    class="bg-white border border-[#e5e9ef] hover:bg-slate-50 text-[#3a4a5c] px-4 py-1.5 rounded-lg font-semibold text-[12px] flex items-center gap-2 transition-all">
                    <i class="ph-bold ph-arrow-left"></i> Kembali
                </a>
            </header>

            {{-- Content Area --}}
            <div class="flex-1 p-6 overflow-y-auto flex flex-col items-center justify-center bg-[#f8fafc]/50">

                <div class="max-w-md w-full">
                    {{-- Form Card --}}
                    <div class="main-card shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-[#f0f2f5] bg-[#fcfdfe]">
                            <h1 class="text-[18px] font-bold text-[#1a2540]">Edit Jurusan</h1>
                            <p class="text-[13px] text-[#8a96a6] mt-0.5">Memperbarui data jurusan
                                <strong>{{ $jurusan->nama_jurusan }}</strong>
                            </p>
                        </div>

                        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" class="p-6 space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-[13px] font-bold text-[#3a4a5c] mb-2">Nama Jurusan</label>
                                <div class="relative">
                                    <i
                                        class="ph ph-buildings absolute left-4 top-1/2 -translate-y-1/2 text-[#9aa5b4]"></i>
                                    <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}"
                                        required
                                        class="input-field w-full pl-11 pr-4 py-3 rounded-xl text-[14px] outline-none"
                                        placeholder="Misal: Teknik Elektro">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[13px] font-bold text-[#3a4a5c] mb-2">Akreditasi</label>
                                <div class="relative">
                                    <i
                                        class="ph ph-certificate absolute left-4 top-1/2 -translate-y-1/2 text-[#9aa5b4]"></i>
                                    <select name="akreditasi" required
                                        class="input-field w-full pl-11 pr-10 py-3 rounded-xl text-[14px] outline-none appearance-none cursor-pointer">
                                        <option value="A" {{ $jurusan->akreditasi == 'A' ? 'selected' : '' }}>Grade
                                            A</option>
                                        <option value="B" {{ $jurusan->akreditasi == 'B' ? 'selected' : '' }}>Grade
                                            B</option>
                                        <option value="C" {{ $jurusan->akreditasi == 'C' ? 'selected' : '' }}>Grade
                                            C</option>
                                        <option value="Unggul" {{ $jurusan->akreditasi == 'Unggul' ? 'selected' : '' }}>
                                            Unggul</option>
                                    </select>
                                    <i
                                        class="ph ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#1a4fad] hover:bg-[#154191] text-white font-bold py-3.5 rounded-xl shadow-md flex items-center justify-center gap-2 text-[14px] transition-all transform active:scale-[0.98]">
                                <i class="ph-bold ph-floppy-disk text-lg"></i>
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>

                    {{-- Footer Info --}}
                    <div class="mt-8 p-4 rounded-xl border border-dashed border-[#e5e9ef] bg-white/50">
                        <div class="flex gap-3">
                            <i class="ph ph-info text-[#1a4fad] text-xl"></i>
                            <p class="text-[12px] text-[#718096] leading-relaxed">
                                <strong>Info:</strong> Data yang diperbarui akan langsung muncul pada daftar
                                jurusan dan dapat digunakan untuk pendaftaran mahasiswa baru.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>
