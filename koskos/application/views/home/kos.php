<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">
<div class="sec-title p-b-60">
	<h3 class="m-text5 t-center">
		kos Terbaru
	</h3>
</div>

	<!-- Slide2 -->
	<div class="wrap-slick2">
	<div class="slick2">

	<?php foreach ($kos as $kos) { ?>	
	<div class="item-slick2 p-l-15 p-r-15">
		<?php 
		echo form_open(base_url('belanja/add'));
		echo form_hidden('id', $kos->id_kos);
		echo form_hidden('qty', 1);
		echo form_hidden('price', $kos->harga);
		echo form_hidden('name', $kos->nama_kos);
		//redirect page
		echo form_hidden('redirect_page', str_replace('index.php/','',current_url())); 
		?>
		<!-- Block2 -->
		<div class="block2">
			<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
				<img src="<?php echo base_url('assets/upload/image/'.$kos->gambar) ?>" alt="<?php echo $kos->nama_kos ?>">

				<div class="block2-overlay trans-0-4">
					<a href="" class="block2-btn-addwishlist hov-pointer trans-0-4">
						<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
					</a>
				</div>
			</div>

			<div class="block2-txt p-t-20">
				<a href="<?php echo base_url('kos/detail/'.$kos->slug_kos) ?>" class="block2-name dis-block s-text3 p-b-5">
					<?php echo $kos->nama_kos ?>
				</a>
				<span class="block2-price m-text6 p-r-5">
					Rp. <?php echo number_format($kos->harga,'0',',','.') ?>
				</span>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	<?php } ?>

	
	</div>
	</div>
</div>
</section>