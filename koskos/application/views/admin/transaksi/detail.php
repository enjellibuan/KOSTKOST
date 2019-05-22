<table class="table table-bordered">
<thead>
	<tr>
		<th width="20%">KODE TRANSAKSI</th>
		<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Nama Pelanggan</td>
		<td><?php echo $header_transaksi->nama_pelanggan ?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
	</tr>
	<tr>
		<td>TOTAL</td>
		<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi ,'0',',','.')?></td>
	</tr>
</tbody>
</table>

<!-- Detail KOMPONEN RAKITAN -->
<table class="table table-bordered">
<thead>
	<tr class="text-light bg-info">
		<th>NO</th>
		<th>KODE kos</th>
		<th>NAMA kos</th>
		<th>JUMLAH</th>
		<th>HARGA</th>
		<th>SUB TOTAL</th>
	</tr>
</thead>
<tbody>
	<?php $i=1; foreach($transaksi as $transaksi) {?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $transaksi->kode_kos ?></td>
		<td><?php echo $transaksi->nama_kos ?></td>
		<td><?php echo number_format($transaksi->jumlah)?></td>
		<td>Rp. <?php echo number_format($transaksi->harga ,'0',',','.')?></td>
		<td>Rp. <?php echo number_format($transaksi->total_harga ,'0',',','.')?></td>
	</tr>
	<?php $i++; } ?>
</tbody>
</table>