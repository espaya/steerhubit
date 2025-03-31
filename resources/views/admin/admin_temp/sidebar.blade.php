<aside class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li class="menu-title">
                            <span>Main menu</span>
                        </li>
                        <li>
                            <a href="{{ route('management') }}" class="{{ request()->routeIs('management') ? 'active' : ''}}">
                                <span data-feather="home" class="nav-icon"></span>
                                <span class="menu-text">Dashboard</span>
                                <span class="toggle-icon"></span>
                            </a>
                        </li>
                        
                        <li class="has-child">
                            <a href="#" class="{{ (request()->routeIs('management.employers') || request()->routeIs('management.employees') || request()->routeIs('management.blocked.users')) ? 'active' : '' }}">
                                <span data-feather="folder" class="nav-icon"></span>
                                <span class="menu-text">Users</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('management.employers') ? 'active' : '' }}" href="{{ route('management.employers') }}">Employers</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('management.employees') ? 'active' : '' }}" href="{{ route('management.employees') }}">Employees</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('management.blocked.users') ? 'active' : '' }}" href="{{route('management.blocked.users')}}">Blocked</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-child">
                            <a href="#" class="{{ (request()->routeIs('management.jobs') || request()->routeIs('management.applied.jobs') || request()->routeIs('management.trash.jobs') || request()->routeIS('management.pending.jobs') || request()->routeIS('management.add.new')) ? 'active' : '' }}">
                                <span data-feather="briefcase" class="nav-icon"></span>
                                <span class="menu-text">Jobs</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('management.add.new') }}" class="{{ request()->routeIs('management.add.new') ? 'active' : '' }}">
                                    Add New
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('management.pending.jobs') }}" class="{{ request()->routeIs('management.pending.jobs') ? 'active' : '' }}">
                                        <span class="menu-text">Pending</span>
                                        <span class="badge badge-success menuItem">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('management.jobs') }}" class="{{ request()->routeIs('management.jobs') ? 'active' : '' }}">Jobs</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.applied.jobs') }}" class="{{ request()->routeIs('management.applied.jobs') ? 'active' : '' }}">Applied Job</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.trash.jobs') }}" class="{{ request()->routeIs('management.trash.jobs') ? 'active' : '' }}">Trash</a>
                                </li>
                            </ul>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </aside>