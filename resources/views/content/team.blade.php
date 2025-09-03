@extends('layouts.dashboard')

@section('title', 'Manajemen Tim')

@section('content')
<div class="welcome-section fade-in">
    <h1 class="welcome-title">Manajemen Tim</h1>
    <p class="welcome-subtitle">Kelola struktur tim dan informasi anggota.</p>
</div>

<!-- Search Bar -->
<div class="search-box" style="position: relative; margin-bottom: 1.5rem; max-width: 300px;">
    <input type="text" placeholder="Cari anggota..." class="search-input" id="searchMember" style="padding: 0.5rem 0.75rem 0.5rem 2.5rem; border: 1px solid var(--border-color); border-radius: 0.5rem; width: 100%; background: var(--bg-secondary); color: var(--text-primary);">
    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary); width: 1rem; height: 1rem;">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
    </svg>
</div>

<!-- Teams List -->
<div class="team-list fade-in">
    <!-- Tim Marketing -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('marketing')">
            <h3>Tim Marketing</h3>
            <span id="icon-marketing">▼</span>
        </div>
        <div id="marketing" class="team-body">
            <div class="members-list">
                <div class="member-item">
                    <div class="member-avatar" style="background: #4556ca;">AS</div>
                    <div class="member-info">
                        <div class="member-name">Ade Surya</div>
                        <div class="member-role">Koordinator</div>
                    </div>
                    <div class="member-actions">
                        <button class="task-complete-btn"><i class="fas fa-pen"></i></button>
                        <button class="task-complete-btn"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-avatar" style="background: #a5b4fc;">DI</div>
                    <div class="member-info">
                        <div class="member-name">Dina Indriani</div>
                        <div class="member-role">Desainer Grafis</div>
                    </div>
                    <div class="member-actions">
                        <button class="task-complete-btn"><i class="fas fa-pen"></i></button>
                        <button class="task-complete-btn"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tim IT -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('it')">
            <h3>Tim IT</h3>
            <span id="icon-it">▼</span>
        </div>
        <div id="it" class="team-body">
            <div class="members-list">
                <div class="member-item">
                    <div class="member-avatar" style="background: #4556ca;">BR</div>
                    <div class="member-info">
                        <div class="member-name">Budi Raharjo</div>
                        <div class="member-role">Backend Developer</div>
                    </div>
                    <div class="member-actions">
                        <button class="task-complete-btn"><i class="fas fa-pen"></i></button>
                        <button class="task-complete-btn"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-avatar" style="background: #f59e0b;">TS</div>
                    <div class="member-info">
                        <div class="member-name">Tia Sutisna</div>
                        <div class="member-role">Frontend Developer</div>
                    </div>
                    <div class="member-actions">
                        <button class="task-complete-btn"><i class="fas fa-pen"></i></button>
                        <button class="task-complete-btn"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tim Keuangan -->
    <div class="card team-card">
        <div class="team-header" onclick="toggleTeam('finance')">
            <h3>Tim Keuangan</h3>
            <span id="icon-finance">▼</span>
        </div>
        <div id="finance" class="team-body">
            <div class="members-list">
                <div class="member-item">
                    <div class="member-avatar" style="background: #ef4444;">RN</div>
                    <div class="member-info">
                        <div class="member-name">Rina Novita</div>
                        <div class="member-role">Accountant</div>
                    </div>
                    <div class="member-actions">
                        <button class="task-complete-btn"><i class="fas fa-pen"></i></button>
                        <button class="task-complete-btn"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleTeam(teamId) {
        const body = document.getElementById(teamId);
        const icon = document.getElementById(`icon-${teamId}`);
        if (body.classList.contains('show')) {
            body.classList.remove('show');
            icon.textContent = '▼';
        } else {
            body.classList.add('show');
            icon.textContent = '▶';
        }
    }

    document.getElementById('searchMember').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll('.member-item').forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(term) ? 'flex' : 'none';
        });
    });

    // Animasi fade-in
    document.querySelectorAll('.fade-in').forEach((el, index) => {
        setTimeout(() => {
            el.style.transition = 'all 0.5s ease';
            el.style.opacity = 1;
            el.style.transform = 'translateY(0)';
        }, index * 100);
    });
</script>
@endpush