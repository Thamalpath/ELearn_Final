<!-- Dashboard -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<br>
{{-- Category Option --}}
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-th-large"></i>
        <p>
            Category
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('category.index') }}"
                class="nav-link  {{ Request::is('category.index') ? 'active' : '' }}">
                <i class="fas fa-list nav-icon"></i>
                <p>All Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('category.create') }}"
                class="nav-link  {{ Request::is('category.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Category</p>
            </a>
        </li>
    </ul>
</li>
<br>
{{-- Sub Category Option --}}
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Sub Category
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('sub_category.index') }}"
                class="nav-link  {{ Request::is('sub_category.index') ? 'active' : '' }}">
                <i class="fas fa-list nav-icon"></i>
                <p>All Sub Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sub_category.create') }}"
                class="nav-link  {{ Request::is('sub_category.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Sub Category</p>
            </a>
        </li>
    </ul>
</li>
<br>
{{-- Product Option --}}
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-store"></i>
        <p>
            product
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('product.index') }}"
                class="nav-link  {{ Request::is('product.index') ? 'active' : '' }}">
                <i class="fas fa-list nav-icon"></i>
                <p>All Products</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('product.create') }}"
                class="nav-link  {{ Request::is('product.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add product</p>
            </a>
        </li>
    </ul>
</li>
<br>
{{-- Orders Option --}}
<li class="nav-item">
    <a href="{{ route('orders.index') }}" class="nav-link {{ Request::is('orders') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>Orders</p>
    </a>
</li>
<br>
<!-- Users Option -->
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>User</p>
    </a>
</li>
