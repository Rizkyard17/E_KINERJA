<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Kinerja - Sistem Manajemen Kinerja DPPKB Kota Jambi</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <!-- Tombol Kembali dengan Ikon Panah -->
    <a href="javascript:history.back()" class="back-button" title="Kembali">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="header">
        <h1>
            <div class="header-icon">📋</div>
            E-Kinerja
        </h1>
        <p>Sistem Manajemen Kinerja DPPKB Kota Jambi</p>
    </div>

    <!-- Card Profil (Output Data) -->
    <div class="card" id="profileCard">
        <div class="profile-section">
            <div class="profile-avatar" id="avatarContainer">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="profile-name" id="outName"> {{ Str::upper(auth()->user()->name ?? 'Nama Lengkap') }}</div>
            <div class="profile-role" id="outRole"> {{ auth()->user()->role ?? 'Role'}}</div>
        </div>

        <div class="profile-info">
            <div class="info-row">
                <span class="info-label">NIK</span>
                <span class="info-value" id="outNip">{{ Str::upper(auth()->user()->nik ?? 'NIK') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value" id="outEmail">{{ auth()->user()->email ?? 'Email' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal Lahir</span>
                <span class="info-value" id="outBirth">{{ auth()->user()->tanggal_lahir ?? 'TanggalLahir'}}</span>
            </div>
            <div class="info-row">
                <span class="info-label">No. HP</span>
                <span class="info-value" id="outHP">{{ auth()->user()->no_hp ?? 'No.HP'}}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Profesi</span>
                <span class="info-value" id="outProfesi">{{ auth()->user()->posisi ?? 'Profesi'}}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status</span>
                <span class="info-value" id="outStatus">{{ auth()->user()->status ?? 'Status'}}</span>
            </div>
        </div>
    </div>

    <!-- Card Edit Profil (Input Data Dummy) -->
    <div class="card">
        <div class="section-title">
            <div class="section-icon">ℹ️</div>
            Edit Profil
        </div>

        <form id="profileForm">
            <div class="profile-info">
                <div class="info-row">
                    <span class="info-label">Nama Lengkap</span>
                    <input type="text" id="inName" value=" {{ auth()->user()->name ?? 'Nama Lengkap' }}">
                </div>
                <div class="info-row">
                    <span class="info-label">NIP</span>
                    <input type="text" id="inNip" value=" {{ Str::upper(auth()->user()->nik ?? 'NIK') }}">
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal Lahir</span>
                    <input type="date" id="inBirth" value=" {{ Str::upper(auth()->user()->tanggal_lahir ?? 'Tanggal Lahir') }}">
                </div>
            </div>

            <!-- Input Ganti Foto -->
            <div class="file-input">
                <input type="file" id="inAvatar" accept="image/*">
                <label for="inAvatar">Ganti Foto Profil</label>
            </div>

            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script>
        // Tangani submit form dummy
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault(); // cegah reload halaman

            // Ambil data input
            const name = document.getElementById('inName').value;
            const nip = document.getElementById('inNip').value;
            const birth = document.getElementById('inBirth').value;

            // Update data di card profil (output)
            document.getElementById('outName').innerText = name;
            document.getElementById('outNip').innerText = nip;
            document.getElementById('outBirth').innerText = birth;

            alert("Perubahan profil berhasil disimpan (dummy)!");
        });

        // Preview gambar saat upload
        document.getElementById('inAvatar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('avatarImage').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Animasi fade in untuk kartu
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>
