<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
<a href="<?php echo base_url() ?>" class="s-text16">
	Home
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<a href="<?php echo base_url('kos') ?>" class="s-text16">
	kos
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<span class="s-text17">
	<?php echo $title ?>
</span>
</div>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
<div class="flex-w flex-sb">
	<div class="w-size13 p-t-30 respon5">
		<div class="wrap-slick3 flex-sb flex-w">
			<div class="wrap-slick3-dots"></div>

			<div class="slick3">
				<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/'.$kos->gambar) ?>">
					<div class="wrap-pic-w">
						<img src="<?php echo base_url('assets/upload/image/'.$kos->gambar) ?>" alt="<?php echo $kos->nama_kos ?>">
					</div>
				</div>
				<?php 
				if ($gambar) { 
					foreach ($gambar as $gambar) {?>
				<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>">
					<div class="wrap-pic-w">
						<img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">
					</div>
				</div>
				<?php }} ?>
			</div>
		</div>
	</div>

	<div class="w-size14 p-t-30 respon5">
		<h1 class="product-detail-name m-text20 p-b-13">
			<?php echo $title ?>
		</h1>
		<span class="m-text17">
			Rp. <?php echo number_format($kos->harga,'0',',','.') ?>
		</span>

		<p class="s-text8 p-t-10">
			<?php echo $kos->keterangan ?>
		</p>

		<!--  -->
		<div class="p-t-33 p-b-60">
			<div class="flex-r-m flex-w p-t-10">
				<div class="w-size16 flex-m flex-w">
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
<div class="container">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Related Kos
		</h3>
	</div>

	<!-- Slide2 -->
	<div class="wrap-slick2">
		<div class="slick2">
		<?php foreach ($kos_related as $kos_related) { ?>	
		<div class="item-slick2 p-l-15 p-r-15">
		<!-- Block2 -->
		<div class="block2">
			<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
				<img src="<?php echo base_url('assets/upload/image/'.$kos_related->gambar) ?>" alt="<?php echo $kos_related->nama_kos ?>">

				<div class="block2-overlay trans-0-4">
					<a href="" class="block2-btn-addwishlist hov-pointer trans-0-4">
						<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
					</a>

					<div class="block2-btn-addcart w-size1 trans-0-4">
						<!-- Button -->
						<button type= "submit" value="submit" 
							class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
							Add to Cart
						</button>
					</div>
				</div>
			</div>

			<div class="block2-txt p-t-20">
				<a href="<?php echo base_url('kos/detail/'.$kos_related->slug_kos) ?>" class="block2-name dis-block s-text3 p-b-5">
					<?php echo $kos_related->nama_kos ?>
				</a>
				<span class="block2-price m-text6 p-r-5">
					Rp. <?php echo number_format($kos_related->harga,'0',',','.') ?>
				</span>
			</div>
		</div>
		</div>
		<?php } ?>
		</div>
	</div>

</div>
</section>

