<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner pb-2 pb-xl-0">
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                            <div data-i18n="Analytics">Analytics</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="dashboards-crm.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                            <div data-i18n="CRM">CRM</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-ecommerce-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                            <div data-i18n="eCommerce">eCommerce</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-logistics-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-truck"></i>
                            <div data-i18n="Logistics">Logistics</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-academy-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-book"></i>
                            <div data-i18n="Academy">Academy</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Students -->
            <li class="menu-item">
                <a href="{{ route('students') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-id-badge"></i>
                    <div data-i18n="Students">Students</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('fee_collections') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-id-badge"></i>
                    <div data-i18n="Fee Collection">Fee Collection</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('expenses') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-id-badge"></i>
                    <div data-i18n="Manage Expense">Manage Expense</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-money"></i>
                    <div data-i18n="Transactions">Transactions</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-shine"></i>
                    <div data-i18n="Referrals">Referrals</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Degree Programs">Degree Programs</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Categories">Categories</div>
                </a>
            </li>
        </ul>
    </div>
</aside>
