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
                                    <a class="{{ request()->routeIs('management.employees') ? 'active' : '' }}" href="{{ route('management.employees') }}">Candidates</a>
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

                        <li class="has-child">
                            <a href="#" class="{{ (request()->routeIs('management.blog') || request()->routeIs('management.blog.create') || request()->routeIs('management.blog.category')) ? 'active' : '' }}">
                                <span data-feather="book-open" class="nav-icon"></span>
                                <span class="menu-text">Blog</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('management.blog') }}" class="{{ request()->routeIs('management.blog') ? 'active' : '' }}">All</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.blog.create') }}" class="{{ request()->routeIs('management.blog.create') ? 'active' : '' }}">Add New</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.blog.category') }}" class="{{ request()->routeIs('management.blog.category') ? 'active' : '' }}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.blog.draft') }}" class="{{ request()->routeIs('management.blog.draft') ? 'active' : '' }}">Draft</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.comments') }}" class="{{ request()->routeIs('admin.comments') ? 'active' : '' }}">Comments</a>
                                </li>
                                <li>
                                    <a href="#" class="">Trash (Blog)</a>
                                </li>
                                <li>
                                    <a href="#" class="">Trash (Comment)</a>
                                </li>
                            </ul>
                            <li>
                                <a href="{{ route('management.subscribers') }}" class="{{ request()->routeIs('management.subscribers') ? 'active' : '' }}">
                                    <span data-feather="user-plus" class="nav-icon"></span>
                                    <span class="menu-text">Subscribers</span>
                                    <span class="toggle-icon"></span>
                                </a>
                            </li>
                        </li>

                        <li>
                            <a class="{{ request()->routeIs('management.contact') ? 'active' : '' }}" href="{{route('management.contact')}}">
                                <span data-feather="phone" class="nav-icon"></span>
                                <span class="menu-text">Contact</span>
                                <span class="toggle-icon"></span>
                            </a>
                        </li>

                        
                        <li class="has-child">
                            <a href="#" class="{{ request()->routeIs('management.inovice') || request()->routeIs('management.invoice.create') ? 'active' : '' }}">
                                <span data-feather="file-text" class="nav-icon"></span>
                                <span class="menu-text">Invoice</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('management.invoice') }}" class="{{ request()->routeIs('management.inovice') ? 'active' : '' }}">All Invoices</a>
                                </li>
                                <li>
                                    <a href="{{ route('management.invoice.create') }}" class="">Generate New Invoice</a>
                                </li>
                                <li>
                                    <a href="#" class="">Trash</a>
                                </li>
                            </ul>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </aside>