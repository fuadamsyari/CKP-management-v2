<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-book "></i>
		</div>
		<div class="sidebar-brand-text mx-3">CKP Flow Report</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider ">

	<!-- Heading -->
	<div class="sidebar-heading">Home</div>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'Dashboard') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url() ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<spzan>Dashboard</spzan>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider ">

	<!-- Heading -->
	<div class="sidebar-heading">Menu</div>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'service') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url('service') ?>">
			<i class="fas fa-fw fa-tools"></i>
			<spzan>Laporan Service</spzan>
		</a>
	</li>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'tinta') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url('tinta') ?>">
			<i class="fas fa-fw fa-tint"></i>
			<span>Laporan Penjualan Tinta</span></a>
	</li>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'potinta') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url('potinta') ?>">
			<i class="fas fa-fw fa-shopping-basket"></i>
			<span>Laporan PO Tinta</span></a>
	</li>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'belanja') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url('belanja') ?>">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span>Laporan Belanja</span></a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider ">
	<!-- Heading -->
	<div class="sidebar-heading">Pengaturan</div>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->router->fetch_class()  == 'pengaturan') echo 'active'; ?>">
		<a class="nav-link py-1" href="<?= base_url('pengaturan') ?>">
			<i class="fas fa-fw fa-cog"></i>
			<span>Pengaturan</span></a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">