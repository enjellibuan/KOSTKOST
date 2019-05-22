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
				<p class="alert alert-success">Tidak punya akun ? Silahkan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-info btn-sm">DAFTAR</a></p>
				<div class="col-md-12">
					<?php 
					//error validation
					echo validation_errors('<div class="alert alert-warning">','</div>');
					//error login
					if ($this->session->flashdata('warning')) {
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('warning');
						echo '</div>';
					}
				
					//form open
					echo form_open(base_url('masuk'), 'class="leave_comment"'); ?>
					<table class="table">
						<tbody>
							<tr>
								<td width="20%">Email</td>
								<td><input type="email" name="email" class="form-control" 
									placeholder="Email anda" value="<?php echo set_value('email') ?>"required></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" class="form-control" 
									placeholder="Password anda" value="<?php echo set_value('password') ?>"required></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button class="btn btn-success btn-lg" type="submit">
										<i class="fa fa-save"> LOGIN</i>
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

