<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="pos-relative">
			<div class= "bgwhite">
				<h1 class="text-center"><?php echo $title ?></h1><hr>
				<div class="clearfix"></div>

				<?php if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} ?>
				<p class="alert alert-success">Punya akun ? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">LOGIN</a></p>
				<div class="col-md-12">
					<?php 
					//error validation
					echo validation_errors('<div class="alert alert-warning">','</div>');
					//form open
					echo form_open(base_url('registrasi'), 'class="leave_comment"'); ?>
					<table class="table">
						<thead>
							<tr>
								<th>Nama</th>
								<th><input type="text" name="nama_pelanggan" class="form-control" 
									placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>"required></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Email</td>
								<td><input type="email" name="email" class="form-control" 
									placeholder="Email anda" value="<?php echo set_value('email') ?>"required></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" class="form-control" 
									placeholder="Password anda" value="<?php echo set_value('password') ?>"required></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td><input type="number" name="telepon" class="form-control" 
									placeholder="telepon anda" value="<?php echo set_value('telepon') ?>"required></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><textarea name="alamat" class="form-control" 
									placeholder="Alamat anda" value="<?php echo set_value('alamat') ?>"required></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button class="btn btn-success btn-lg" type="submit">
										<i class="fa fa-save"> SIMPAN</i>
									</button>
									<button class="btn btn-warning btn-lg" type="reset">
										<i class="fa fa-times"> RESET</i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="size10 trans-0-4 m-t-10 m-b-10">
				<!-- Button -->
			</div>
		</div>
		</div>
	</div>
</section>

