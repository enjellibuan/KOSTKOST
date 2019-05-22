<?php 
$nav_kos			= $this->konfigurasi_model->nav_kos();
$nav_kos_mobile	= $this->konfigurasi_model->nav_kos();
?>
<div class="wrap_header">
			<!-- Logo -->
			<a href="<?php echo base_url() ?>" class="logo">
				<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
			</a>

			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<!-- HOME -->
						<li>
							<a href="<?php echo base_url() ?>">Home</a>
						</li>

						<!-- Kategori -->
						<li>
							<a href="<?php echo base_url('kos') ?>">KOS</a>
							<ul class="sub_menu">
								<?php foreach($nav_kos as $nav_kos){ ?>
								<li><a href="<?php echo base_url('kos/Kategori/'.$nav_kos->slug_kategori) ?>">
									<?php echo $nav_kos->nama_kategori ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">
				<?php if ($this->session->userdata('email')) { ?>
					<a href="<?php echo base_url('dasbor/profile') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					<?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp; &nbsp;</a>

					<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
					<i class="fa fa-sign-out">LOGOUT</i>
					</a>
				<?php }else{ ?>
					<a href="<?php echo base_url('masuk') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					<?php echo 'LOGIN'?> &nbsp;</a>
				<?php } ?>

				<span class="linedivide1"></span>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="index.html" class="logo-mobile">
			<img src="<?php echo base_url() ?>assets/template/images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<a href="#" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide2"></span>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						<?php echo $site->tagline ?>
					</span>
				</li>

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							<?php echo $site->email ?>
						</span>

						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option>REY</option>
							</select>
						</div>
					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
					</div>
				</li>

				<!-- Menu Mobile Home -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url() ?>">Home</a>
				</li>

				<!-- Menu Mobile kos -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url('kos') ?>">kos</a>
					<ul class="sub-menu">
						<?php foreach($nav_kos_mobile as $nav_kos_mobile){ ?>
						<li><a href="<?php echo base_url('kos/Kategori/'.$nav_kos_mobile->slug_kategori) ?>">
							<?php echo $nav_kos_mobile->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
				</li>
				<!-- Menu kontak mobile -->
				<li class="item-menu-mobile">
					<a href="<?php echo base_url('kontak') ?>">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>
