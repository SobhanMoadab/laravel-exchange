<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="dashboard">
                            <i class="iconsminds-digital-drawing"></i> Dashboard
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard/pages') ? 'active' : '' }}">
                        <a href="/dashboard/pages">
                            <i class="iconsminds-project"></i> Pages
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard/post') ? 'active' : '' }}">
                        <a href="/dashboard/post">
                            <i class="iconsminds-files"></i> Posts
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard/order') ? 'active' : '' }}">
                        <a href="/dashboard/order">
                            <i class="iconsminds-pantone"></i> Order
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/roles">
                            <i class="iconsminds-unlock-2"></i> Roles Users
                        </a>
                    </li>
                    <li class="{{ request()->is('dashboard/currency') ? 'active' : '' }}">
                        <a href="/dashboard/currency">
                            <i class="iconsminds-coins-2"></i> Currency
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/plugins">
                            <i class="iconsminds-cpu"></i> Plugins
                        </a>
                    </li>

                    <li>
                        <a href="#Setting">
                            <i class="iconsminds-gear"></i> Setting
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li>
                        <a href="/dashboard">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Home</span>
                        </a>
                    </li>

                </ul>
                <ul class="list-unstyled" data-link="Pages" id="Pages">
                    <li class="{{ request()->is('dashboard/pages') ? 'active' : '' }}">
                        <a href="/dashboard/pages">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">Pages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">Contact us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">About us</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">Custom Page</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">Rules</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-note"></i> <span class="d-inline-block">Verification Help</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="Posts" id="Posts">
                    <li class="{{ request()->is('dashboard/post') ? 'active' : '' }}">
                        <a href="/dashboard/post">
                            <i class="simple-icon-book-open"></i> <span class="d-inline-block">Posts</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="Orders">
                    <li class="{{ request()->is('dashboard/order') ? 'active' : '' }}">
                        <a href="/dashboard/order">
                            <i class="simple-icon-list"></i> <span class="d-inline-block">Orders</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="Roles">
                    <li>
                        <a href="/dashboard/Roles">
                            <i class="simple-icon-menu"></i> <span class="d-inline-block">Roles</span>
                        </a>
                    </li>
                </ul>
                {{-- <ul class="list-unstyled" data-link="currency">
                    <li>
                        <a href="/dashboard/currency">
                            <i class="simple-icon-menu"></i> <span class="d-inline-block">currency</span>
                        </a>
                    </li>
                </ul> --}}
                <ul class="list-unstyled" data-link="Plugins">
                    <li>
                        <a href="Apps.MediaLibrary.html">
                            <i class="simple-icon-picture"></i> <span class="d-inline-block">plugins</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Todo.List.html">
                            <i class="simple-icon-check"></i> <span class="d-inline-block">Install plugins</span>
                        </a>
                    </li>
                </ul> 
                <ul class="list-unstyled" data-link="Setting">
                    <li>
                        <a href="#">
                            <i class="simple-icon-magic-wand"></i> <span class="d-inline-block">System Preferences</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Maintenance</span>
                        </a>
                    </li>
                </ul>


                
            </div>
        </div>
    </div>