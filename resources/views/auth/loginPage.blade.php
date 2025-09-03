@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="auth-wrapper">

    <!-- Main Content -->
    <div class="auth-content">
        <!-- Branding Section -->
        <div class="branding">
            <div class="logo-container">
                <div class="logo-icon">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <rect width="48" height="48" rx="12" fill="url(#gradient1)"/>
                        <path d="M12 20h24v2H12v-2zm0 6h24v2H12v-2zm0 6h16v2H12v-2z" fill="white"/>
                        <defs>
                            <linearGradient id="gradient1" x1="0" y1="0" x2="48" y2="48">
                                <stop offset="0%" stop-color="#667eea"/>
                                <stop offset="100%" stop-color="#764ba2"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <h1 class="title">E-Kinerja</h1>
            </div>
            <p class="subtitle">Sistem Manajemen Kinerja DPPKB Kota Jambi</p>
        </div>

        <!-- Login Form -->
        <div class="login-container">
            <div class="form-header">
                <h2>Selamat Datang Kembali</h2>
                <p>Silakan masuk ke akun Anda</p>
            </div>

            <form id="loginForm" action="{{ route('login.store') }}" method="POST">
                @csrf

                <!-- Username -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder=" "
                        autocomplete="off"
                        required
                        autofocus
                    />
                    <label for="name">Username</label>
                </div>

                <!-- Password -->
                <div class="input-group">
                    <div class="input-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <circle cx="12" cy="16" r="1"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder=" "
                        autocomplete="new-password"
                        required
                    />
                    <span class="toggle-password" onclick="togglePassword()">
                        <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </span>
                    <label for="password">Password</label>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <label class="checkbox-container">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkmark"></span>
                        Ingat saya
                    </label>
                    <a href="#" class="forgot-link">Lupa password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <span class="btn-text">Masuk</span>
                    <div class="btn-loader" style="display: none;">
                        <div class="spinner"></div>
                    </div>
                </button>

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="error-message">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="15" y1="9" x2="9" y2="15"/>
                            <line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Success Notification -->
    <div id="notification" class="notification">
        <div class="notification-content">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22,4 12,14.01 9,11.01"/>
            </svg>
            <span>Login berhasil!</span>
        </div>
    </div>
</div>
@endsection