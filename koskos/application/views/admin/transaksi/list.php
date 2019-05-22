<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<table class="table table-bordered">
						<thead>
							<tr class="text-light bg-info">
								<th>NO</th>
								<th>PELANGGAN</th>
								<th>KODE</th>
								<th>TANGGAL</th>
								<th>JUMLAH TOTAL</th>
								<th>JUMLAH KOMPONEN</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($header_transaksi as $header_transaksi) {?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $header_transaksi->nama_pelanggan ?></td>
								<td><?php echo $header_transaksi->kode_transaksi ?></td>
								<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
								<td>Rp. <?php echo number_format($header_transaksi->jumlah_transaksi ,'0',',','.')?></td>
								<td><?php echo $header_transaksi->total_item ?></td>
								<td>
									<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>"
										class="btn btn-success btn-xs">
										<i class="fa fa-eye"></i> DETAIL
									</a>
								</td>
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
</section>

