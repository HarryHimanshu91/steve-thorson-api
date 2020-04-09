<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link {{ request()->segment('1') == 'admin' && request()->segment('2') == '' ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Dashboard</p>
            </a>
        </li> 
        <li class="nav-item has-treeview {{ request()->segment('2') == 'roles' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment('2') == 'roles' ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Role Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->segment('2') == 'roles' && request()->segment('3') == ''  ? 'active' : '' }}">
                        <p>View</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.create') }}" class="nav-link {{ request()->segment('2') == 'roles' && request()->segment('3') == 'create' ? 'active' : '' }}">
                        <p>Add</p>
                    </a>
                </li>
            </ul>
        </li>  
        <li class="nav-item has-treeview {{ request()->segment('2') == 'users' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment('2') == 'users' ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Admin Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->segment('2') == 'users' && request()->segment('3') == '' ? 'active' : '' }}">
                        <p>View</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->segment('2') == 'users' && request()->segment('3') == 'create' ? 'active' : '' }}">
                        <p>Add</p>
                    </a>
                </li>
            </ul>
        </li> 

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Content Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.content.index') }}" class="nav-link {{ request()->segment('2') == 'roles' && request()->segment('3') == ''  ? 'active' : '' }}">
                        <p>View</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.content.create') }}" class="nav-link {{ request()->segment('2') == 'roles' && request()->segment('3') == 'create' ? 'active' : '' }}">
                        <p>Add</p>
                    </a>
                </li>
            </ul>
        </li>  


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Member Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.members.index') }}" class="nav-link {{ request()->segment('2') == 'roles' && request()->segment('3') == ''  ? 'active' : '' }}">
                        <p>View</p>
                    </a>
                </li>
              
            </ul>
        </li>  



    </ul>
</nav>
<!-- /.sidebar-menu -->