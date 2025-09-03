@extends('layouts.dashboard')

@section('title', 'Daftar Laporan')

@section('content')
<!-- Page Header -->
<div class="welcome-section fade-in">
    <h1 class="welcome-title">Daftar Laporan</h1>
    <p class="welcome-subtitle">Kelola dan pantau laporan dari semua tim.</p>
</div>

<!-- Action & Search Bar -->
<div class="action-bar fade-in">
    <div class="search-box">
        <input type="text" placeholder="Cari laporan..." class="search-input" id="searchInput">
        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>

    <!-- Tombol Tambah Laporan -->
    <button class="btn add-report-btn">
        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah Laporan
    </button>
</div>

<!-- Reports Grouped by Team -->
<div class="team-reports fade-in">
    <!-- Tim Marketing -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('marketing')">
            <h3>Tim Marketing</h3>
            <span id="icon-marketing">▼</span>
        </div>
        <div id="marketing" class="team-body show">
            <div class="reports-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Kampanye Q4 2023</strong>
                            </td>
                            <td class="report-date">15 Okt 2023</td>
                            <td>
                                <span class="status-badge status-completed">Selesai</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Analisis Media Sosial</strong>
                            </td>
                            <td class="report-date">10 Okt 2023</td>
                            <td>
                                <span class="status-badge status-progress">Proses</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tim IT -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('it')">
            <h3>Tim IT</h3>
            <span id="icon-it">▼</span>
        </div>
        <div id="it" class="team-body show">
            <div class="reports-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Pembaruan Keamanan Sistem</strong>
                            </td>
                            <td class="report-date">14 Okt 2023</td>
                            <td>
                                <span class="status-badge status-completed">Selesai</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Backup Database Bulanan</strong>
                            </td>
                            <td class="report-date">12 Okt 2023</td>
                            <td>
                                <span class="status-badge status-progress">Proses</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tim Keuangan -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('finance')">
            <h3>Tim Keuangan</h3>
            <span id="icon-finance">▼</span>
        </div>
        <div id="finance" class="team-body show">
            <div class="reports-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Laporan Keuangan September</strong>
                            </td>
                            <td class="report-date">10 Okt 2023</td>
                            <td>
                                <span class="status-badge status-pending">Pending</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                        <tr class="report-row">
                            <td>
                                <strong class="report-title">Audit Internal Q3</strong>
                            </td>
                            <td class="report-date">8 Okt 2023</td>
                            <td>
                                <span class="status-badge status-completed">Selesai</span>
                            </td>
                            <td class="report-actions">
                                <a href="#" class="action-link action-view">Lihat</a>
                                <a href="#" class="action-link action-edit">Edit</a>
                                <a href="#" class="action-link action-delete">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toggle collapse/expand per tim
    function toggleTeam(teamId) {
        const body = document.getElementById(teamId);
        const icon = document.getElementById(`icon-${teamId}`);
        if (body.classList.contains('show')) {
            body.classList.remove('show');
            icon.textContent = '▶';
        } else {
            body.classList.add('show');
            icon.textContent = '▼';
        }
    }

    // Pencarian global di semua tim
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll('.report-row').forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(term) ? '' : 'none';
        });
    });

    // Animasi fade-in
    document.querySelectorAll('.fade-in').forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('animate');
        }, index * 200);
    });
</script>
@endpush