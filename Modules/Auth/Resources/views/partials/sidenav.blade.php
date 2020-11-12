{{--@if(Auth::user()->hasAnyPermission(['user-view','role-view']))--}}
<li class="treeview {{ Request::is('users','roles','roles/*') ? 'active' : '' }}">
    <a href="#"><i
            class="fa fa-user"></i>
        <span>Users and Roles</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>

    <ul class="treeview-menu" style="">
        <li class="{{ Request::is('users') ? 'active' : '' }}"><a
                href="{{route('users.index')}}">Users</a></li>
        <li class="{{ Request::is('roles', 'roles/*') ? 'active' : '' }}"><a
                href="{{route('roles.index')}}">Roles</a></li>
    </ul>
</li>
