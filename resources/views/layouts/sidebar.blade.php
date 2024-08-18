<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Route::currentRouteName() == 'guest.index' ? 'active' : '' }}"
                href="{{ route('guest.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Calon Customers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}"
                href="{{ route('product.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'order.index' ? 'active' : '' }}"
                href="{{ route('order.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ in_array(Route::currentRouteName(), ['customer.index', 'customer.show']) ? 'active' : '' }}"
                href="{{ route('customer.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Customers</span>
            </a>
        </li>
    </ul>
</nav>
