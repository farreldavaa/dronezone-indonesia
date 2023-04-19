<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li
        class="sidebar-item active ">
        <a href="{{ route('products.index') }}" class='sidebar-link {{ Route::has('products.*') ? 'active' : '' }}'>
            <i class="bi bi-grid-fill"></i>
            <span>Products</span>
        </a>
    </li>
</ul>
