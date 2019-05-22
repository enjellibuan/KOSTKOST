<?php 

if (isset($error)) {
  echo '<p class=alert alert-warning">';
  echo $error;
  echo "</p>";
}

echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/kos/tambah'),' class="form-horizontal"');
 ?>

 <div class="form-group form-group-lg">
  	<label class="col-md-2 control-label">Nama kos</label>
  <div class="col-md-8">
    <input type="text" name="nama_kos" class="form-control" placeholder="Nama kos" value=
    "<?php echo set_value('nama_kos') ?>" required>
  </div>
</div>

 <div class="form-group">
  	<label class="col-md-2 control-label">Kode kos</label>
  <div class="col-md-5">
    <input type="text" name="kode_kos" class="form-control" placeholder="Kode kos" value=
    "<?php echo set_value('kode_kos') ?>" required>
  </div>
</div>


 <div class="form-group">
    <label class="col-md-2 control-label">Kategori kos</label>
  <div class="col-md-5">
    <select name="id_kategori" class="form-control">
      <?php foreach ($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategori ?>">
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
    "<?php echo set_value('harga_kos') ?>" required>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Keterangan kos</label>
  <div class="col-md-8">
    <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan kos" id="editor" value=
    "<?php echo set_value('keterangan') ?>" required></textarea>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Keyword kos</label>
  <div class="col-md-8">
    <textarea type="text" name="keywords" class="form-control" placeholder="Keyword kos" value=
    "<?php echo set_value('keywords') ?>" required></textarea>
  </div>
</div>

 <div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar kos</label>
  <div class="col-md-8">
    <input type="file" name="gambar" class="form-control" required="required">
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