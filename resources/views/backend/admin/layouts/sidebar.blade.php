<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>

                <li class="submenu">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>

<!--                 <li class="submenu">
                    <a href="charts.html"><i class="fa fa-fw fa-area-chart"></i><span> Charts </span> </a>
                </li> -->
                <li class="submenu">
                    <a href="{{ route('blogcat.index') }}" ><i class="fa fa-fw fa-newspaper-o"></i><span>{{ trans('message.blogcat') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('blog.index') }}"><i class="fa fa-fw fa fa-newspaper-o"></i><span>{{ trans('message.New') }}</span></a>
                </li>
<!--                 <li class="submenu">
                    <a href="{{ route('contact.index') }}"><i class="fa fa-fw fa-print"></i><span>{{ trans('message.Contact') }}</span></a>
                </li>  -->
                <li class="submenu">
                    <a href="{{ route('province.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('province.province') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('district.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('province.district') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('procat.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('province.propertyCategoy') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('protype.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('province.propertyType') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('setcalendar.index') }}"><i class="fa fa-fw fa-calendar"></i><span>{{ trans('message.setcalendar') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('contract.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('message.contract') }}</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('role.index') }}"><i class="fa fa-fw fa-tv"></i><span>{{ trans('label.role') }}</span></a>
                </li>
                <li >
                    <a href="{{ route('user.list') }}"><i class="fa fa-fw fa-user"></i><span>{{ trans('label.list_user') }}</span></a>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        
        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->
