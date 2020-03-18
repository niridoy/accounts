            <!-- START SIDEBAR-->
            <nav class="page-sidebar" id="sidebar">
                <div id="sidebar-collapse">
                    <div class="admin-block d-flex">
                        <div>
                            <img src="{{asset('assets/img/admin-avatar.png')}}" width="45px" />
                        </div>
                        <div class="admin-info">
                            <div class="font-strong">{{ Auth::user()->name }}</div><small>Administrator</small></div>
                    </div>
                    <ul class="side-menu metismenu">
                        <li>
                            <a class="active" href="{{ route('user.dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                                <span class="nav-label">Dashboard</span>
                            </a>
                        </li>
                        <li class="heading">Task</li>
                        <li>
                            <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                                <span class="nav-label">Task List</span>
                            </a>
                            <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                                <span class="nav-label">Project List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- END SIDEBAR-->
