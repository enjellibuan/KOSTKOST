<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<?php include('menu.php') ?>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<h1><?php echo $title ?></h1><hr>
				<?php
				if ($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-success">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} 
				//error validation
				echo validation_errors('<div class="alert alert-warning">','</div>');
				//form open
				echo form_open(base_url('dasbor/profile'), 'class="leave_comment"'); ?>
				<table class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th><input type="text" name="nama_pelanggan" class="form-control" 
								placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>"required></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" class="form-control" 
								placeholder="Email anda" value="<?php echo $pelanggan->email ?>"readonly></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><input type="text" name="telepon" class="form-control" 
								placeholder="telepon anda" value="<?php echo $pelanggan->telepon ?>" required></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control" 
								placeholder="KETIKKAN PASSWORD ANDA" value=""></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
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
</section>

