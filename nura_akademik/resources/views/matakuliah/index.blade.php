<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah - Nura Akademik</title>
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

        /* ===== SEARCH INPUT (Inside Table) ===== */
        .inner-search {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }

        .inner-search:focus {
            background: #ffffff;
            border-color: #1a4fad;
            box-shadow: 0 0 0 3px rgba(26, 79, 173, 0.08);
        }

        /* Custom Pagination Style agar serasi */
        .pagination-container nav svg {
            width: 18px;
        }

        .pagination-container nav div:first-child {
            display: none;
        }

        /* Sembunyikan text bawaan Laravel */
        .pagination-container .relative.inline-flex.shadow-sm.rounded-md {
            shadow: none;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="sidebar w-56 shrink-0 hidden md:flex flex-col">
            <div class="p-5 border-b border-[#1e3152]">
                <div class="flex items-center gap-3">
                    <div class="brand-icon w-9 h-9 flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#93b8f5]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <span class="text-[15px] font-semibold text-[#e8edf5] tracking-tight">Nura <span
                            class="text-[#5d9cf5]">Akademik</span></span>
                </div>
            </div>

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
                    class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#3a5570]" viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Data Jurusan
                </a>

                <a href="/matakuliah"
                    class="nav-item flex active items-center gap-3 px-3 py-2.5 rounded-lg text-[13px] text-[#7a9bb8]">
                    <svg class="w-4 h-4 fill-[#93b8f5]" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                    Mata Kuliah
                </a>
            </nav>

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

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col min-w-0">
            <header class="topbar h-14 flex items-center justify-between px-6 shrink-0">
                <div class="flex items-center gap-2 text-[13px] text-[#9aa5b4]">
                    <span>Sistem Informasi Akademik</span>
                    <i class="ph ph-caret-right text-[10px]"></i>
                    <span class="text-[#3a4a5c] font-medium">Data Mata Kuliah</span>
                </div>
                <a href="{{ route('matakuliah.create') }}"
                    class="bg-[#1a4fad] hover:bg-[#154191] text-white px-4 py-1.5 rounded-lg font-semibold text-[12px] flex items-center gap-2 transition-all">
                    <i class="ph-bold ph-plus"></i> Tambah Matakuliah
                </a>
            </header>

            <div class="flex-1 p-6 overflow-y-auto space-y-6">
                <div>
                    <h1 class="text-[20px] font-semibold text-[#1a2540]">Manajemen Mata Kuliah</h1>
                    <p class="text-[13px] text-[#8a96a6] mt-1">Daftar kurikulum mata kuliah Nura Akademik.</p>
                </div>

                @if (session('success'))
                    <div
                        class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl text-[13px] flex items-center gap-3">
                        <i class="ph-fill ph-check-circle text-lg"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="main-card overflow-hidden shadow-sm">
                    <div
                        class="p-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-[#f0f2f5]">
                        <h3 class="font-bold text-[#2e3e52] text-[15px]">Daftar Mata Kuliah</h3>
                        <div class="flex items-center gap-2 ml-auto">
                            {{-- Search Box --}}
                            <div class="relative">
                                <i
                                    class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-[#aab2be]"></i>
                                <input type="text" id="searchInput" placeholder="Cari nama mata kuliah..."
                                    class="w-52 pl-9 pr-4 py-2 bg-[#f8fafc] border border-[#e5e9ef] rounded-xl text-[12px] focus:border-[#1a4fad] focus:ring-0 outline-none transition-all">
                            </div>

                            {{-- Export PDF --}}
                            <a href="{{ route('matakuliah.print') }}" target="_blank"
                                class="flex items-center gap-1.5 px-3 py-2 rounded-lg bg-[#fff0f0] text-[#e06b6b] hover:bg-[#ffe0e0] text-[12px] font-semibold transition-colors shrink-0">
                                <i class="ph-bold ph-file-pdf"></i>
                                PDF
                            </a>

                            {{-- Export Excel --}}
                            <a href="{{ url('/matakuliah/export-csv') }}" target="_blank"
                                class="flex items-center gap-1.5 px-3 py-2 rounded-lg bg-[#edfaf3] text-[#2e9e68] hover:bg-[#d6f5e5] text-[12px] font-semibold transition-colors shrink-0">
                                <i class="ph-bold ph-file-xls"></i>
                                Excel
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left" id="mkTable">
                            <thead>
                                <tr class="bg-[#fcfdfe]">
                                    <th
                                        class="p-4 text-[10px] font-semibold tracking-widest text-[#aab2be] uppercase border-b border-[#f0f2f5] text-center w-16">
                                        No</th>
                                    <th
                                        class="p-4 text-[10px] font-semibold tracking-widest text-[#aab2be] uppercase border-b border-[#f0f2f5]">
                                        Nama Mata Kuliah</th>
                                    <th
                                        class="p-4 text-[10px] font-semibold tracking-widest text-[#aab2be] uppercase border-b border-[#f0f2f5] text-center">
                                        SKS</th>
                                    <th
                                        class="p-4 text-[10px] font-semibold tracking-widest text-[#aab2be] uppercase border-b border-[#f0f2f5] text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#f0f2f5]">
                                @forelse($matakuliah as $index => $mk)
                                    <tr class="hover:bg-[#fbfcfe] transition-colors table-row-data">
                                        {{-- Hitung nomor urut agar sinkron dengan pagination --}}
                                        <td class="p-4 text-[13px] text-[#8a96a6] text-center">
                                            {{ ($matakuliah->currentPage() - 1) * $matakuliah->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="text-[13px] font-bold text-[#3a4a5c] mk-name">{{ $mk->nama_matakuliah }}</span>
                                        </td>
                                        <td class="p-4 text-center">
                                            <span
                                                class="px-2.5 py-1 bg-[#eef3fc] text-[#1a4fad] rounded-md text-[11px] font-bold">{{ $mk->sks }}
                                                SKS</span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <div class="flex justify-end gap-2">
                                                <a href="{{ route('matakuliah.edit', $mk->id) }}"
                                                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#fff6e6] text-[#ba7517] hover:bg-[#ffecd1]">
                                                    <i class="ph-bold ph-pencil-simple"></i>
                                                </a>
                                                <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                                                    method="POST" onsubmit="return confirm('Hapus data?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#fff0f0] text-[#e06b6b] hover:bg-[#ffe0e0]">
                                                        <i class="ph-bold ph-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-10 text-center text-[#aab2be] text-[13px]">Belum
                                            ada data mata kuliah.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Section --}}
                    <div class="p-4 border-t border-[#f0f2f5] bg-[#fcfdfe]">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <p class="text-[12px] text-[#8a96a6] font-medium">
                                Menampilkan <span class="text-[#3a4a5c]">{{ $matakuliah->firstItem() ?? 0 }}</span> -
                                <span class="text-[#3a4a5c]">{{ $matakuliah->lastItem() ?? 0 }}</span> dari <span
                                    class="text-[#3a4a5c]">{{ $matakuliah->total() }}</span> data
                            </p>
                            <div class="pagination-container">
                                {{ $matakuliah->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const rows = document.getElementsByClassName("table-row-data");

            for (let i = 0; i < rows.length; i++) {
                const nameCol = rows[i].querySelector(".mk-name");
                if (nameCol) {
                    const textValue = nameCol.textContent || nameCol.innerText;
                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
