<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
{{-- @can('rooms') --}}
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-bed"></i>
        <p>
            Example
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            {{-- <a href="{{route('room.index')}}" class="nav-link  {{ Request::is('room.index') ? 'active' : '' }}"> --}}
            <a href="#" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Example 1</p>
            </a>
        </li>
        <li class="nav-item">
            {{-- <a href="{{route('room.create')}}" class="nav-link  {{ Request::is('room.create') ? 'active' : '' }}"> --}}
            <a href="#" class="nav-link">
                <i class="fas fa-folder-plus nav-icon"></i>
                <p>Example 2</p>
            </a>
        </li>
    </ul>
</li>
{{-- @endcan --}}
