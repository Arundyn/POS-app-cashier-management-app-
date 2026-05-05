<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="form-input" placeholder="Nama lengkap">
            @error('name') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="form-input" placeholder="email@contoh.com">
            @error('email') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" required
                   class="form-input" placeholder="••••••••">
            @error('password') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
                   class="form-input" placeholder="••••••••">
            @error('password_confirmation') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary" style="margin-top: 0.5rem;">Daftar</button>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </form>
</x-guest-layout>