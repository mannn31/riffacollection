<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <?php if (in_groups('admin')) : ?>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-auto"><i>Riffa</i><sup>Collection</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

    <?php else : ?>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/'); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-auto"><i>Riffa</i><sup>Collection</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (in_groups('admin')) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Pages
        </div>

        <!-- Nav Item - Categories -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/categories">
                <i class="fas fa-fw fa-tags"></i>
                <span>Categories</span></a>
        </li>

        <!-- Nav Item - Product -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/product">
                <i class="fas fa-fw fa-boxes-stacked"></i>
                <span>Product</span></a>
        </li>

        <!-- Nav Item - Cart -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="/admin/cart">
                <i class="fas fa-fw fa-cart-shopping"></i>
                <span>Cart</span></a>
        </li> -->

        <!-- Nav Item - Order -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/order">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Orders</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        <!-- Nav Item - Setting -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/manage-users">
                <i class="fas fa-fw fa-user-gear"></i>
                <span>Manage Users</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-users-gear"></i>
                <span>Manage Groups</span>
            </a>
            <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="manage-groups">Groups</a>
                    <a class="collapse-item" href="manage-groups-permissions">Groups Permissions</a>
                    <a class="collapse-item" href="manage-groups-users">Groups Users</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manage-permissions">
                <i class="fas fa-fw fa-gears"></i>
                <span>Manage Permissions</span></a>
        </li> -->
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>