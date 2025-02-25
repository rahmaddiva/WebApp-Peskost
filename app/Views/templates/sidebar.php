<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <i class="tf-icon bx bx-home-circle"></i>
            <span class="app-brand-text demo menu-text fw-normal ms-2">PESKOST</span>
        </a>

        <a href="jascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu &amp;
                Utama</span></li>
        <!-- Dashboard -->
        <li class="menu-item ">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- jika session adalah user maka jangan tampilkan halaman agenda -->

        <li class="menu-item ">
            <a href="/kost" class="menu-link">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div data-i18n="Analytics">Kelola Kost</div>
            </a>
        </li>


        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Penjualan</span></li>
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/presensi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Analytics">Data Pemesanan</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="/lokasi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Analytics">Data Transaksi</div>
            </a>
        </li>


    </ul>


</aside>
<!-- / Menu -->