@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Welcome Section -->
<div class="welcome-section fade-in">
    <h1 class="welcome-title">Selamat datang kembali! 👋</h1>
    <p class="welcome-subtitle">Berikut ringkasan aktivitas proyek Anda hari ini.</p>
</div>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card fade-in">
        <div class="stat-content">
            <div class="stat-info">
                <h3>Total Proyek</h3>
                <div class="stat-value">24</div>
                <div class="stat-change positive">+12%</div>
            </div>
            <div class="stat-icon">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="stat-card fade-in">
        <div class="stat-content">
            <div class="stat-info">
                <h3>Tugas Selesai</h3>
                <div class="stat-value">142</div>
                <div class="stat-change positive">+8%</div>
            </div>
            <div class="stat-icon">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="stat-card fade-in">
        <div class="stat-content">
            <div class="stat-info">
                <h3>Anggota Tim</h3>
                <div class="stat-value">18</div>
                <div class="stat-change positive">+2</div>
            </div>
            <div class="stat-icon">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="stat-card fade-in">
        <div class="stat-content">
            <div class="stat-info">
                <h3>Deadline Dekat</h3>
                <div class="stat-value">7</div>
                <div class="stat-change negative">-3</div>
            </div>
            <div class="stat-icon">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="charts-section">
    <div class="chart-card fade-in">
        <h3 class="card-title">Progres Mingguan</h3>
        <div class="chart-container">
            <canvas id="weeklyChart"></canvas>
        </div>
    </div>
    <div class="activity-card fade-in">
        <h3 class="card-title">Aktivitas Tim</h3>
        <div class="activity-feed">
            <div class="activity-item">
                <div class="activity-avatar">S</div>
                <div class="activity-content">
                    <div class="activity-text"><strong>Sarah Kim</strong> menyelesaikan tugas</div>
                    <div class="activity-time">2 menit lalu</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-avatar">J</div>
                <div class="activity-content">
                    <div class="activity-text"><strong>John Doe</strong> menambah komentar</div>
                    <div class="activity-time">15 menit lalu</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-avatar">M</div>
                <div class="activity-content">
                    <div class="activity-text"><strong>Maria Garcia</strong> memperbarui status</div>
                    <div class="activity-time">1 jam lalu</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-avatar">A</div>
                <div class="activity-content">
                    <div class="activity-text"><strong>Ahmad Rizki</strong> mengunggah file</div>
                    <div class="activity-time">2 jam lalu</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Project Statistics -->
<div class="chart-card fade-in" style="margin-bottom: 2rem;">
    <h3 class="card-title">Statistik Proyek</h3>
    <div class="chart-container">
        <canvas id="projectChart"></canvas>
    </div>
    <div class="chart-legend">
        <div class="legend-item">
            <div class="legend-color" style="background: #4556ca;"></div>
            <span class="legend-text">Selesai</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #a5b4fc;"></div>
            <span class="legend-text">Dalam Progres</span>
        </div>
    </div>
</div>

<!-- Urgent Tasks -->
<div class="tasks-card fade-in">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h3 class="card-title" style="margin: 0;">Tugas Mendesak</h3>
        <button style="color: var(--accent-color); background: none; border: none; font-weight: 500; cursor: pointer;">
            Lihat Semua
        </button>
    </div>
    <div class="tasks-list">
        <div class="task-item">
            <div class="task-content">
                <div class="priority-dot priority-high"></div>
                <div class="task-info">
                    <h4>Redesign Landing Page</h4>
                    <div class="task-project">Website Revamp</div>
                </div>
            </div>
            <div class="task-actions">
                <div class="task-deadline">
                    <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    2 hari
                </div>
                <button class="task-complete-btn">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="task-item">
            <div class="task-content">
                <div class="priority-dot priority-medium"></div>
                <div class="task-info">
                    <h4>API Integration</h4>
                    <div class="task-project">Mobile App</div>
                </div>
            </div>
            <div class="task-actions">
                <div class="task-deadline">
                    <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    5 hari
                </div>
                <button class="task-complete-btn">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="task-item">
            <div class="task-content">
                <div class="priority-dot priority-high"></div>
                <div class="task-info">
                    <h4>User Testing</h4>
                    <div class="task-project">UX Research</div>
                </div>
            </div>
            <div class="task-actions">
                <div class="task-deadline">
                    <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    1 minggu
                </div>
                <button class="task-complete-btn">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="task-item">
            <div class="task-content">
                <div class="priority-dot priority-low"></div>
                <div class="task-info">
                    <h4>Database Migration</h4>
                    <div class="task-project">Backend Update</div>
                </div>
            </div>
            <div class="task-actions">
                <div class="task-deadline">
                    <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    3 hari
                </div>
                <button class="task-complete-btn">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection