<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon bi bi-speedometer"></i>
                <span class="app-menu__label">
                    Dashboard Admin
                </span>
            </a>
            <a class="app-menu__item {{ request()->is('fasilitas*') ? 'active' : '' }}"
                href="{{ route('fasilitas.index') }}">
                <i class="app-menu__icon bi bi-list-ul"></i>
                <span class="app-menu__label">
                    Daftar Fasilitas
                </span>
            </a>
        </li>
    </ul>
</aside>
