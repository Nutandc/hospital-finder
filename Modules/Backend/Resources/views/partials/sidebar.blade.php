<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        @can('doctor-view')
            <li class="{{ Request::is('doctors','/doctors/*') ? 'active' : '' }}">
                <a href="{{route('doctors.index')}}"><i class=" fa fa-user"></i>
                    <span>Doctors</span></a>
            </li>
        @endcan
        @can('disease-view')
            <li class="{{ Request::is('disease','/disease/*') ? 'active' : '' }}">
                <a href="{{route('disease.index')}}"><i class="fa fa-user"></i>
                    <span>Disease</span></a>
            </li>
        @endcan
        @can('hospital-view')
            <li class="{{ Request::is('hospitals','/hospitals/*') ? 'active' : '' }}">
                <a href="{{route('hospitals.index')}}"><i class="fa fa-user"></i>
                    <span>Hospital</span></a>
            </li>
        @endcan
        @can('symptom-view')
            <li class="{{ Request::is('symptoms','/symptoms/*') ? 'active' : '' }}">
                <a href="{{route('symptoms.index')}}"><i class="fa fa-user"></i>
                    <span>Symptom</span></a>
            </li>
        @endcan
        {{--        @include('backend::partials.sidenav')--}}
        <li class="header">SETTINGS</li>
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
                @can('student-view')
                    <li class="{{ Request::is('users') ? 'active' : '' }}"><a
                            href="{{route('users.index')}}">Users</a></li>
                @endcan
                @can('student-view')
                    <li class="{{ Request::is('roles', 'roles/*') ? 'active' : '' }}"><a
                            href="{{route('roles.index')}}">Roles</a></li>
                @endcan

            </ul>
        </li>
    </ul>
</section>

<!-- /.sidebar -->
