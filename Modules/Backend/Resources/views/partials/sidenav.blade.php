{{--@if(Auth::user()->hasAnyPermission(['user-view','role-view']))--}}
<li class="treeview {{ Request::is('class','subjects',
        'class/*','syllabus','syllabus/*',
        'sections', 'sections/*',
        'assignments', 'assignments/*',
        'routines', 'routines/*'

) ? 'active' : '' }}">
    <a href="#"><i
            class="fa fa-id-card"></i>
        <span>Academic</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        @can('class-view')
            <li class="{{ Request::is('class','/class/*') ? 'active' : '' }}">
                <a href="{{route('class.index')}}">
                    <span>Classes</span></a>
            </li>
        @endcan
        @can('subject-view')
            <li class="{{ Request::is('subjects','/subjects/*') ? 'active' : '' }}">
                <a href="{{route('subjects.index')}}">
                    <span>Subjects</span></a>
            </li>
        @endcan
        @can('section-view')
            <li class="{{ Request::is('sections', 'sections/*') ? 'active' : '' }}"><a
                    href="{{route('sections.index')}}">Section</a></li>
        @endcan
        @can('syllabus-view')
            <li class="{{ Request::is('syllabus', 'syllabus/*') ? 'active' : '' }}"><a
                    href="{{route('syllabus.index')}}">Syllabus</a></li>
        @endcan
        @can('assignment-view')

            <li class="{{ Request::is('assignment', 'assignment/*') ? 'active' : '' }}"><a
                    href="{{route('assignments.index')}}">Assignment</a></li>
        @endcan
        @can('section-view')
            <li class="{{ Request::is('routine', 'routine/*') ? 'active' : '' }}"><a
                    href="{{route('routines.index')}}">Routine</a></li>
        @endcan

    </ul>
</li>
