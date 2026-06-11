<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa — Nura Akademik</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@500&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f7fa;
            color: #1a2540;
            padding: 40px;
        }

        /* ===== HEADER ===== */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 24px;
            border-bottom: 2px solid #0f1e35;
            margin-bottom: 32px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: #0f1e35;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            width: 18px;
            height: 18px;
            stroke: #93b8f5;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 600;
            color: #0f1e35;
            letter-spacing: -0.3px;
        }

        .brand-name span {
            color: #1a4fad;
        }

        .meta {
            text-align: right;
        }

        .meta-title {
            font-size: 13px;
            font-weight: 600;
            color: #1a4fad;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .meta-date {
            font-size: 11px;
            color: #8a96a6;
            margin-top: 4px;
        }

        /* ===== SUMMARY STRIP ===== */
        .summary {
            display: flex;
            gap: 16px;
            margin-bottom: 28px;
        }

        .summary-box {
            background: #0f1e35;
            color: white;
            border-radius: 10px;
            padding: 14px 20px;
            min-width: 140px;
        }

        .summary-box .label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #5d80a0;
            margin-bottom: 4px;
        }

        .summary-box .value {
            font-size: 22px;
            font-weight: 600;
            color: #93b8f5;
            font-family: 'DM Mono', monospace;
        }

        .summary-box.light {
            background: #eef3fc;
        }

        .summary-box.light .label {
            color: #6b7e9a;
        }

        .summary-box.light .value {
            color: #1a4fad;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: #0f1e35;
        }

        thead th {
            padding: 12px 16px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #5d80a0;
            text-align: left;
        }

        thead th:first-child {
            border-radius: 10px 0 0 10px;
        }

        thead th:last-child {
            border-radius: 0 10px 10px 0;
        }

        tbody tr {
            border-bottom: 1px solid #e8ecf3;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        td {
            padding: 12px 16px;
            font-size: 13px;
            color: #3a4a5c;
        }

        .td-no {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: #aab2be;
            width: 48px;
        }

        .td-nim {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            font-weight: 500;
            color: #1a4fad;
        }

        .td-nama {
            font-weight: 500;
            color: #1a2540;
        }

        .td-jurusan {
            color: #6b7e9a;
            font-size: 12px;
        }

        .badge {
            display: inline-block;
            background: #eef3fc;
            color: #1a4fad;
            border-radius: 6px;
            padding: 3px 10px;
            font-size: 11px;
            font-weight: 500;
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 36px;
            padding-top: 16px;
            border-top: 1px solid #e8ecf3;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-left {
            font-size: 11px;
            color: #aab2be;
        }

        .footer-right {
            font-size: 11px;
            color: #aab2be;
        }

        /* ===== PRINT ===== */
        @media print {
            body {
                background: white;
                padding: 24px;
            }

            @page {
                margin: 16mm;
                size: A4;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <!-- Header -->
    <div class="header">
        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>
            <div>
                <div class="brand-name">Nura <span>Akademik</span></div>
            </div>
        </div>
        <div class="meta">
            <div class="meta-title">Laporan Data Mata Kuliah</div>
            <div class="meta-date">Dicetak: {{ now()->translatedFormat('d F Y, H:i') }} WIB</div>
        </div>
    </div>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-box">
            <div class="label">Total Mata Kuliah</div>
            <div class="value">{{ count($matakuliah) }}</div>
        </div>
        <div class="summary-box light">
            <div class="label">Tahun Akademik</div>
            <div class="value" style="font-size:15px; padding-top:4px;">{{ now()->year }}/{{ now()->year + 1 }}</div>
        </div>
        <div class="summary-box light">
            <div class="label">Status</div>
            <div class="value" style="font-size:13px; padding-top:6px;">Aktif</div>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliah as $item)
                <tr>
                    <td class="td-no">{{ $loop->iteration }}</td>
                    <td class="td-nama">{{ $item->nama_matakuliah }}</td>
                    <td class="td-jurusan">
                        <span class="badge">{{ $item->sks }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-left">Sistem Informasi Akademik — Nura Akademik</div>
        <div class="footer-right">Halaman 1 dari 1 &nbsp;·&nbsp; Dokumen Resmi</div>
    </div>

</body>

</html>
