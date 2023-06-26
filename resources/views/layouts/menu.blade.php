<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

{{-- Category Option --}}
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th-large"></i>
        {{-- <i class="fas fa-th"></i> For Sub Category --}}
        <p>
            Category
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link  {{ Request::is('category.index') ? 'active' : '' }}">
                <i class="fas fa-list nav-icon"></i>
                <p>All Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('category.create')}}" class="nav-link  {{ Request::is('category.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Category</p>
            </a>
        </li>
    </ul>
</li>
