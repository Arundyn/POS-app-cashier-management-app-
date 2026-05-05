<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap');

    .nav-root {
        font-family: 'DM Sans', sans-serif;
        background: rgba(15, 15, 19, 0.92);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .nav-inner {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 62px;
    }

    /* Logo */
    .nav-logo {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
        flex-shrink: 0;
    }
    .nav-logo-mark {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background: linear-gradient(135deg, #6341ff, #a391ff);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .nav-logo-mark svg {
        width: 14px;
        height: 14px;
        color: #fff;
    }
    .nav-logo-text {
        font-family: 'DM Serif Display', Georgia, serif;
        font-size: 1.1rem;
        color: #f0eefc;
        letter-spacing: -0.01em;
    }

    /* Nav links */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-left: 2.5rem;
    }
    .nav-link {
        position: relative;
        padding: 0.35rem 0.8rem;
        font-size: 0.82rem;
        font-weight: 500;
        letter-spacing: 0.03em;
        color: rgba(200, 195, 230, 0.6);
        text-decoration: none;
        border-radius: 8px;
        transition: color 0.2s ease, background 0.2s ease;
        white-space: nowrap;
    }
    .nav-link:hover {
        color: #f0eefc;
        background: rgba(255,255,255,0.05);
    }
    .nav-link.active {
        color: #f0eefc;
        background: rgba(99, 65, 255, 0.18);
    }
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 2px;
        background: #6341ff;
        border-radius: 2px;
    }

    /* Right side */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* User dropdown trigger */
    .nav-user-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.75rem 0.35rem 0.45rem;
        border-radius: 99px;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.04);
        color: rgba(200,195,230,0.75);
        font-size: 0.82rem;
        font-weight: 500;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s, color 0.2s;
    }
    .nav-user-btn:hover {
        border-color: rgba(99, 65, 255, 0.45);
        background: rgba(99, 65, 255, 0.1);
        color: #f0eefc;
    }
    .nav-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6341ff, #c084fc);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.65rem;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }
    .nav-chevron {
        width: 14px;
        height: 14px;
        transition: transform 0.2s ease;
        color: currentColor;
        opacity: 0.6;
    }

    /* Dropdown panel */
    .nav-dropdown {
        min-width: 170px;
        background: #1a1824;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 0.4rem;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        overflow: hidden;
    }
    .nav-dropdown-item {
        display: block;
        width: 100%;
        padding: 0.5rem 0.85rem;
        font-size: 0.82rem;
        color: rgba(200,195,230,0.65);
        text-decoration: none;
        border-radius: 9px;
        transition: background 0.15s, color 0.15s;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        background: none;
        border: none;
        text-align: left;
        box-sizing: border-box;
    }
    .nav-dropdown-item:hover {
        background: rgba(99,65,255,0.15);
        color: #f0eefc;
    }
    .nav-dropdown-divider {
        height: 1px;
        background: rgba(255,255,255,0.06);
        margin: 0.3rem 0;
    }
    .nav-dropdown-logout {
        color: rgba(248,113,113,0.65);
    }
    .nav-dropdown-logout:hover {
        background: rgba(248,113,113,0.1);
        color: #fca5a5;
    }

    /* Hamburger */
    .nav-hamburger {
        display: none;
        padding: 0.45rem;
        border-radius: 9px;
        border: 1px solid rgba(255,255,255,0.08);
        background: transparent;
        color: rgba(200,195,230,0.6);
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }
    .nav-hamburger:hover {
        background: rgba(99,65,255,0.12);
        color: #f0eefc;
    }

    /* Mobile menu */
    .nav-mobile {
        border-top: 1px solid rgba(255,255,255,0.05);
        padding: 0.75rem 1.25rem 1rem;
        display: none;
    }
    .nav-mobile.open { display: block; }
    .nav-mobile-link {
        display: block;
        padding: 0.6rem 0.75rem;
        font-size: 0.85rem;
        font-weight: 500;
        color: rgba(200,195,230,0.6);
        text-decoration: none;
        border-radius: 9px;
        transition: background 0.15s, color 0.15s;
        font-family: 'DM Sans', sans-serif;
    }
    .nav-mobile-link:hover,
    .nav-mobile-link.active {
        background: rgba(99,65,255,0.15);
        color: #f0eefc;
    }
    .nav-mobile-user {
        padding: 0.75rem 0.75rem 0.5rem;
        border-top: 1px solid rgba(255,255,255,0.05);
        margin-top: 0.5rem;
    }
    .nav-mobile-name {
        font-size: 0.88rem;
        font-weight: 500;
        color: #f0eefc;
    }
    .nav-mobile-email {
        font-size: 0.75rem;
        color: rgba(200,195,230,0.4);
        margin-top: 0.1rem;
    }

    @media (max-width: 640px) {
        .nav-links, .nav-right { display: none !important; }
        .nav-hamburger { display: flex; }
    }
</style>

<nav x-data="{ open: false, userOpen: false }" class="nav-root">
    <div class="nav-inner">

        {{-- Logo + Links --}}
        <div style="display:flex; align-items:center;">
            <a href="{{ route('dashboard') }}" class="nav-logo">
                <span class="nav-logo-mark">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </span>
                <span class="nav-logo-text">arashiya <em style="font-style:italic;color:#a391ff;">shop</em></span>
            </a>

            <div class="nav-links">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('categories.index') }}"
                   class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">Kategori</a>
                <a href="{{ route('items.index') }}"
                   class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}">Item</a>
                <a href="{{ route('transactions.pos') }}"
                   class="nav-link {{ request()->routeIs('transactions.pos') ? 'active' : '' }}">Transaksi</a>
                <a href="{{ route('transactions.index') }}"
                   class="nav-link {{ request()->routeIs('transactions.index') ? 'active' : '' }}">History</a>
            </div>
        </div>

        {{-- Right: User dropdown + Hamburger --}}
        <div class="nav-right">

            {{-- User Dropdown --}}
            <div style="position:relative;" x-data="{ userOpen: false }">
                <button @click="userOpen = !userOpen"
                        :class="{ 'border-[rgba(99,65,255,0.45)]': userOpen }"
                        class="nav-user-btn">
                    <span class="nav-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                    {{ Auth::user()->name }}
                    <svg class="nav-chevron" :style="userOpen ? 'transform:rotate(180deg)' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="userOpen"
                     @click.outside="userOpen = false"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     style="position:absolute; right:0; top:calc(100% + 8px);"
                     class="nav-dropdown">
                    <a href="{{ route('profile.edit') }}" class="nav-dropdown-item">
                        Profile
                    </a>
                    <div class="nav-dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-dropdown-item nav-dropdown-logout"
                                style="width:100%;">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            {{-- Hamburger --}}
            <button @click="open = !open" class="nav-hamburger">
                <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'block': !open}"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': !open, 'block': open}" class="hidden"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{'open': open}" class="nav-mobile">
        <a href="{{ route('dashboard') }}"
           class="nav-mobile-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('categories.index') }}"
           class="nav-mobile-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">Kategori</a>
        <a href="{{ route('items.index') }}"
           class="nav-mobile-link {{ request()->routeIs('items.*') ? 'active' : '' }}">Item</a>
        <a href="{{ route('transactions.pos') }}"
           class="nav-mobile-link {{ request()->routeIs('transactions.pos') ? 'active' : '' }}">Transaksi</a>
        <a href="{{ route('transactions.index') }}"
           class="nav-mobile-link {{ request()->routeIs('transactions.index') ? 'active' : '' }}">History</a>

        <div class="nav-mobile-user">
            <div class="nav-mobile-name">{{ Auth::user()->name }}</div>
            <div class="nav-mobile-email">{{ Auth::user()->email }}</div>
            <div style="margin-top:0.65rem; display:flex; flex-direction:column; gap:0.25rem;">
                <a href="{{ route('profile.edit') }}" class="nav-mobile-link">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-mobile-link"
                            style="width:100%;text-align:left;background:none;border:none;cursor:pointer;color:rgba(248,113,113,0.65);"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>