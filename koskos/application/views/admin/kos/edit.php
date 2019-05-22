<?php 

if (isset($error)) {
  echo '<p class=alert alert-warning">';
  echo $error;
  echo "</p>";
}

echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/kos/edit/'.$kos->id_kos),' class="form-horizontal"');
 ?>

 <div class="form-group form-group-lg">
  	<label class="col-md-2 control-label">Nama kos</label>
  <div class="col-md-8">
    <input type="text" name="nama_kos" class="form-control" placeholder="Nama kos" value=
    "<?php echo $kos->nama_kos ?>" required>
  </div>
</div>

 <div class="form-group">
  	<label class="col-md-2 control-label">Kode kos</label>
  <div class="col-md-5">
    <input type="text" name="kode_kos" class="form-control" placeholder="Kode kos" value=
    "<?php echo $kos->kode_kos ?>" required>
  </div>
</div>


 <div class="form-group">
    <label class="col-md-2 control-label">Kategori kos</label>
  <div class="col-md-5">
    <select name="id_kategori" class="form-control">
      <?php foreach ($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategori ?>" <?php if ($kos->id_kategori==$kategori->id_kategori) {
        echo "selected";
      } ?>>
        <?php echo $kategori->nama_kategori ?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Harga kos</label>
  <div class="col-md-5">
    <input type="number" name="harga_kos" class="form-control" placeholder="Harga kos" value=
    "<?php echo $kos->harga ?>" required>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Keterangan kos</label>
  <div class="col-md-8">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan kos" id="editor"><?php echo $kos->keterangan ?></textarea>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Keyword kos</label>
  <div class="col-md-8">
    <textarea name="keywords" class="form-control" placeholder="Keyword kos"><?php echo $kos->keywords ?></textarea>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar kos</label>
  <div class="col-md-8">
    <input type="file" name="gambar" class="form-control">
  </div>
</div>

 <div class="form-group">
  	<label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit" ">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset" ">
    	<i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

 <?php  echo form_close(); ?>