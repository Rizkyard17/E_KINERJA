// Toggle password visibility
function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeOpen = document.querySelector('.eye-open');
    const eyeClosed = document.querySelector('.eye-closed');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'block';
    } else {
        passwordField.type = 'password';
        eyeOpen.style.display = 'block';
        eyeClosed.style.display = 'none';
    }
}

// Show notification toast
function showNotification(message, type = 'success') {
    const notif = document.getElementById('notification');
    const content = notif.querySelector('.notification-content span');
    
    content.textContent = message;
    
    // Change color based on type
    if (type === 'error') {
        notif.style.background = 'var(--error-color)';
    } else {
        notif.style.background = 'var(--success-color)';
    }
    
    notif.classList.add('show');

    setTimeout(() => {
        notif.classList.remove('show');
    }, 4000);
}

// Form submission with validation and loading state
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const submitBtn = this.querySelector('.btn-login');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');

    if (username === '' || password === '') {
        e.preventDefault();
        showNotification('Mohon isi username dan password.', 'error');
        return;
    }

    // Show loading state
    btnText.style.display = 'none';
    btnLoader.style.display = 'block';
    submitBtn.disabled = true;

    // Reset loading state after 5 seconds (failsafe)
    setTimeout(() => {
        btnText.style.display = 'block';
        btnLoader.style.display = 'none';
        submitBtn.disabled = false;
    }, 5000);
});

// Input focus animations
document.querySelectorAll('.input-group input').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });

    input.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
    });
});

// Add smooth transitions on page load
window.addEventListener('load', function() {
    document.querySelector('.auth-content').style.opacity = '0';
    document.querySelector('.auth-content').style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        document.querySelector('.auth-content').style.transition = 'all 0.6s ease';
        document.querySelector('.auth-content').style.opacity = '1';
        document.querySelector('.auth-content').style.transform = 'translateY(0)';
    }, 100);
});