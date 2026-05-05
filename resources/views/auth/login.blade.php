<x-guest-layout>
    @if (session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="form-input" placeholder="Your Email">
            @error('email') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" required
                   class="form-input" placeholder="password">
            @error('password') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-row">
            <label class="form-check">
                <input type="checkbox" name="remember">
                <span>Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="form-link">Lupa password?</a>
            @endif
        </div>

        <button type="submit" class="btn-primary">Masuk</button>

        <div class="auth-footer">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>