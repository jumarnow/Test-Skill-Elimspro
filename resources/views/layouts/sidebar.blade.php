<ul class="sidebar-menu">
    <li class="header">Navigasi</li>
    <li class="{{ request()->is('/') ? 'active' : '' }}">
        <a href='{{ url('/') }}'>
            <i class='fa fa-home'></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="{{ request()->is('compan*') ? 'active' : '' }}">
        <a href='{{ url('company') }}'>
            <i class='fa fa-building'></i>
            <span>Company</span>
        </a>
    </li>
    <li class="{{ request()->is('employee*') ? 'active' : '' }}">
        <a href='{{ url('employees') }}'>
            <i class='fa fa-users'></i>
            <span>Employees</span>
        </a>
    </li>
<li><br></li>
</ul><!-- /.sidebar-menu -->
