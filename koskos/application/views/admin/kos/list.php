<p>
	<a href="<?php echo base_url('admin/kos/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<?php 
//notif
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
 			<th>NAMA</th>
 			<th>KATEGORI</th>
 			<th>HARGA</th>
 			<th>KETERANGAN</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($kos as $kos) { ?>
 		<tr>
 			<td><?php echo $no ?></td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/'.$kos->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
 			</td>
 			<td><?php echo $kos->nama_kos ?></td>
 			<td><?php echo $kos->nama_kategori ?></td>
 			<td><?php echo number_format($kos->harga, '0',',','.') ?></td>
 			<td><?php echo $kos->keterangan ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/kos/gambar/'.$kos->id_kos) ?>" 
 					class= "btn btn-success btn-xs"><i class="fa fa-image"></i> GAMBAR (<?php echo $kos->total_gambar ?>)</a>

 				<a href="<?php echo base_url('admin/kos/edit/'.$kos->id_kos) ?>" 
 					class= "btn btn-warning btn-xs"><i class="fa fa-edit"></i> EDIT</a>
				
				<?php include('delete.php') ?> 
 			</td>
 		</tr>
 	<?php $no++; } ?>
 	</tbody>
 </table>