<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item <?php if ($section=="dashboard") { echo "active"; } ?>">
                <a href="/admin" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li> 
            <li class="nav-item <?php if ($section=="news") { echo "active"; } ?>">
                <a href="/admin/news" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">News</span>
                </a>
            </li> 
            <li class="nav-item <?php if ($section=="users") { echo "active"; } ?>">
                <a href="/admin/users" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Users</span>
                </a>
            </li> 
        </ul>
    </div>
</div>

