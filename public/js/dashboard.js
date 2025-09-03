
// Sidebar Toggle
const toggleBtn = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    sidebarOverlay.classList.toggle('active');
});

sidebarOverlay.addEventListener('click', () => {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
});

// Dropdown functionality
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const toggle = dropdown.querySelector('.dropdown-toggle');
    
    toggle.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        // Close other dropdowns
        dropdowns.forEach(other => {
            if (other !== dropdown) {
                other.classList.remove('active');
            }
        });
        
        // Toggle current dropdown
        dropdown.classList.toggle('active');
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', () => {
    dropdowns.forEach(dropdown => {
        dropdown.classList.remove('active');
    });
});

// Prevent dropdown menu clicks from closing
document.querySelectorAll('.dropdown-menu').forEach(menu => {
    menu.addEventListener('click', (e) => {
        e.stopPropagation();
    });
});

// Auto-hide sidebar on mobile when clicking nav links
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        }
    });
});

// Resize handler
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    }
});

// Add fade-in animation to content
document.addEventListener('DOMContentLoaded', () => {
    const mainContent = document.getElementById('mainContent');
    mainContent.classList.add('fade-in');
});

document.addEventListener('DOMContentLoaded', function () {
    // Progres Mingguan
    const weeklyCtx = document.getElementById('weeklyChart');
    if (weeklyCtx) {
        new Chart(weeklyCtx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Tugas Selesai',
                    data: [12, 19, 15, 22, 28, 24, 30],
                    borderColor: '#4556ca',
                    backgroundColor: 'rgba(69, 86, 202, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: true, position: 'top' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // Statistik Proyek
    const projectCtx = document.getElementById('projectChart');
    if (projectCtx) {
        new Chart(projectCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [
                    {
                        label: 'Selesai',
                        data: [3, 5, 4, 6, 7, 5],
                        backgroundColor: '#4556ca'
                    },
                    {
                        label: 'Dalam Progres',
                        data: [7, 6, 8, 5, 4, 6],
                        backgroundColor: '#a5b4fc'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }

    // Animasi Fade-in
    document.querySelectorAll('.fade-in').forEach((el, index) => {
        setTimeout(() => {
            el.style.transition = 'all 0.5s ease';
            el.style.opacity = 1;
            el.style.transform = 'translateY(0)';
        }, index * 100);
    });
});

