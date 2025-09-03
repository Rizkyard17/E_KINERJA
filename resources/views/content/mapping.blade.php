@extends('layouts.dashboard')

@section('title', 'Mapping Lokasi')

@section('content')

<div class="container">
    <!-- Page Header -->
    <div class="welcome-section fade-in">
        <h1 class="welcome-title">Mapping Lokasi Tim Lapangan</h1>
        <p class="welcome-subtitle">Pantau distribusi dan aktivitas tim di berbagai wilayah secara real-time</p>
    </div>

    <!-- Action Bar -->
    <div class="action-bar fade-in">
        <div class="search-box">
            <input type="text" placeholder="Cari wilayah atau tim..." class="search-input" id="searchLocation">
            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <button class="btn" id="addLocationBtn">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Lokasi
        </button>
    </div>

    <!-- Location Grid -->
    <div class="location-grid fade-in">
        <!-- Wilayah Utara -->
        <div class="card location-card" data-location="utara">
            <div class="location-header">
                <div class="location-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div class="location-info">
                    <h3>Wilayah Utara</h3>
                    <p>Bekasi, Depok, Bogor</p>
                </div>
            </div>
            <div class="location-footer">
                <div class="team-count">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    8 Tim Aktif
                </div>
                <div class="location-actions">
                    <button class="btn btn-sm btn-view" onclick="showTeamList('utara')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat
                    </button>
                    <button class="btn btn-sm" onclick="editLocation('utara')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Wilayah Selatan -->
        <div class="card location-card" data-location="selatan">
            <div class="location-header">
                <div class="location-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div class="location-info">
                    <h3>Wilayah Selatan</h3>
                    <p>Tangerang, Tangsel, Serang</p>
                </div>
            </div>
            <div class="location-footer">
                <div class="team-count">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    6 Tim Aktif
                </div>
                <div class="location-actions">
                    <button class="btn btn-sm btn-view" onclick="showTeamList('selatan')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat
                    </button>
                    <button class="btn btn-sm" onclick="editLocation('selatan')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Remote/WFH -->
        <div class="card location-card remote-card" data-location="remote">
            <div class="location-header">
                <div class="location-icon remote-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                </div>
                <div class="location-info">
                    <h3>Remote / WFH</h3>
                    <p>Tim kerja dari rumah</p>
                </div>
            </div>
            <div class="location-footer">
                <div class="team-count">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    5 Tim Aktif
                </div>
                <div class="location-actions">
                    <button class="btn btn-sm btn-view" onclick="showTeamList('wfh')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Lihat
                    </button>
                    <button class="btn btn-sm" onclick="editLocation('remote')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Team List -->
    <div class="team-list fade-in" id="teamList">
        <div class="team-list-header">
            <h2 class="team-list-title" id="teamListTitle">Daftar Tim</h2>
            <button class="btn-close" onclick="closeTeamList()">&times;</button>
        </div>
        <div class="team-grid" id="teamGrid">
            <div class="team-member">
                <div class="member-avatar">AR</div>
                <div class="member-info">
                    <h4>Andi Rahman</h4>
                    <p>Supervisor</p>
                </div>
                <span class="member-status status-online">Online</span>
            </div>
            <div class="team-member">
                <div class="member-avatar">BS</div>
                <div class="member-info">
                    <h4>Budi Santoso</h4>
                    <p>Teknisi</p>
                </div>
                <span class="member-status status-break">Break</span>
            </div>
        </div>
    </div>

    <!-- Maps Section -->
    <div class="maps-card fade-in">
        <div class="maps-header">
            <h2 class="maps-title">Peta Lokasi Tim</h2>
        </div>
        <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.277708285279!2d106.82775337490597!3d-6.227978493740787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf7a5b5c73e9!2sMonas!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="locationModal">
    <div class="modal-content">
        <h2 class="modal-title" id="modalTitle">Tambah Lokasi</h2>
        <div class="form-group">
            <label class="form-label">Nama Lokasi</label>
            <input type="text" class="form-input" id="locationName">
        </div>
        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-input" id="locationDesc">
        </div>
        <div class="form-actions">
            <button class="btn btn-secondary" onclick="closeModal()">Batal</button>
            <button class="btn" onclick="saveLocation()">Simpan</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Animasi masuk
    document.querySelectorAll('.fade-in').forEach(el => {
        setTimeout(() => el.classList.add('animate'), 200);
    });

    // Show team list
    function showTeamList(location) {
        document.getElementById('teamList').style.display = 'block';
        document.getElementById('teamListTitle').innerText = 'Daftar Tim - ' + location.toUpperCase();
    }

    function closeTeamList() {
        document.getElementById('teamList').style.display = 'none';
    }

    // Modal
    const modal = document.getElementById('locationModal');
    document.getElementById('addLocationBtn').onclick = () => {
        document.getElementById('modalTitle').innerText = 'Tambah Lokasi';
        modal.style.display = 'flex';
    };

    function editLocation(location) {
        document.getElementById('modalTitle').innerText = 'Edit Lokasi - ' + location.toUpperCase();
        modal.style.display = 'flex';
    }

    function closeModal() {
        modal.style.display = 'none';
    }

    function saveLocation() {
        alert('Lokasi berhasil disimpan!');
        closeModal();
    }

    // Tutup modal kalau klik luar
    window.onclick = (e) => {
        if (e.target === modal) {
            closeModal();
        }
    };

    // Pencarian lokasi
    document.getElementById('searchLocation').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll('.location-card').forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(term) ? 'block' : 'none';
        });
    });
</script>
@endpush
@endsection