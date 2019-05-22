<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" 
	style="background-image: url(<?php echo base_url() ?>assets/template/images/heading-pages-02.jpg);">
	<!-- ganti gambar heading di sini -->
	<h2 class="l-text2 t-center">
		<?php echo $title ?>
	</h2>
	<p class="m-text13 t-center">
		<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
	</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Kategori kos
					</h4>

					<ul class="p-b-54">
						<?php foreach ($listing_kategori as $listing_kategori) {
						
						?>
						<li class="p-t-4">
							<a href="<?php echo base_url('kos/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
								<?php echo $listing_kategori->nama_kategori ?>
							</a>
						</li>
						<?php } ?>
					</ul>

				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

				<!-- Product -->
				<div class="row">
					<?php foreach ($kos as $kos) {
						# code...
					?>
					<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
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
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="fa fa-eye" aria-hidden="true"></i>
										<i class="fa fa-eye dis-none" aria-hidden="true"></i>
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

				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26 text-center">
					<?php echo $pagin; ?>
				</div>
			</div>
		</div>
	</div>
</section>

