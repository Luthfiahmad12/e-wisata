<aside class="app-sidebar">
    <div class="app-sidebar__user">
        @if (auth()->user()->customer && auth()->user()->customer->photo)
            <img class="app-sidebar__user-avatar" src="{{ asset('uploads/' . auth()->user()->customer->photo) }}"
                alt="User Image" height="100" width="100" />
        @else
            <img class="app-sidebar__user-avatar" src="https://placehold.co/100x100?text=A" alt="User Image" />
        @endif
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon bi bi-speedometer2"></i>
                <span class="app-menu__label">
                    Dashboard Admin
                </span>
            </a>
        </li>
        <li class="treeview {{ request()->is('admin/master-data*') ? 'is-expanded' : '' }} ">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon bi bi-list-ul"></i>
                <span class="app-menu__label">Master Data</span>
                <i class="treeview-indicator bi bi-chevron-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->routeIs('fasilitas.*') ? 'active' : '' }}"
                        href="{{ route('fasilitas.index') }}">
                        <i class="icon bi bi-arrow-return-right"></i>
                        Daftar Fasilitas
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->routeIs('wisata.*') ? 'active' : '' }}"
                        href="{{ route('wisata.index') }}">
                        <i class="icon bi bi-arrow-return-right"></i>
                        Daftar Wisata
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->routeIs('rumah_makan.*') ? 'active' : '' }}"
                        href="{{ route('rumah_makan.index') }}">
                        <i class="icon bi bi-arrow-return-right"></i>
                        Daftar Rumah Makan
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->routeIs('penginapans.*') ? 'active' : '' }}"
                        href="{{ route('penginapans.index') }}">
                        <i class="icon bi bi-arrow-return-right"></i>
                        Daftar Penginapan
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->routeIs('transportasi.*') ? 'active' : '' }}"
                        href="{{ route('transportasi.index') }}">
                        <i class="icon bi bi-arrow-return-right"></i>
                        Daftar Transportasi
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="#" onclick="alert('fitur selanjutnya')">
                <i class="app-menu__icon bi bi-journal-bookmark"></i>
                <span class="app-menu__label">
                    Daftar Paket Wisata
                </span>
            </a>
        </li>
    </ul>
</aside>
