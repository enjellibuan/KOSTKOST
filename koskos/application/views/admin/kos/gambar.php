<?php 

if (isset($error)) {
  echo '<p class=alert alert-warning">';
  echo $error;
  echo "</p>";
}

echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/kos/gambar/'.$kos->id_kos),' class="form-horizontal"');
 ?>

 <div class="form-group form-group-lg">
  	<label class="col-md-2 control-label">Judul Gambar</label>
  <div class="col-md-8">
    <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar kos" value=
    "<?php echo set_value('judul_gambar') ?>" required>
  </div>
</div>

 <div class="form-group form-group-lg">
  	<label class="col-md-2 control-label">Unggah Gambar</label>
  <div class="col-md-4">
    <input type="file" name="gambar" class="form-control" placeholder="Gambar kos" value=
    "<?php echo set_value('gambar') ?>" required>
  </div>
  <div class="col-md-4">
  	<button class="btn btn-success btn-lg" name="submit" type="submit" ">
    	<i class="fa fa-save"></i> Simpan Gambar
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset" ">
    	<i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>
<?php
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>GAMBAR</th>
 			<th>JUDUL</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<td>1</td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/'.$kos->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
 			</td>
 			<td><?php echo $kos->nama_kos ?></td>
 			<td>
 			</td>
 		</tr>
 		<?php $no=2; foreach ($gambar as $gambar) { ?>
 		<tr>
 			<td><?php echo $no ?></td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
 			</td>
 			<td><?php echo $gambar->judul_gambar ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/kos/delete_gambar/'.$kos->id_kos.'/'.$gambar->id_gambar) ?>" 
 					class= "btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ?')"><i class="fa fa-trash-o"></i> HAPUS</a>
 			</td>
 		</tr>
 	<?php $no++; } ?>
 	</tbody>
 </table>