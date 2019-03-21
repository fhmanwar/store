<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#keterangan",
    height: 150,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<?php
// Validasi
echo validation_errors('<div class="alert alert-success">','</div>');

// Error
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk));
?>
<div class="col-md-6">
<div class="form-group form-group-lg">
<label>Nama produk</label>
<input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" value="<?php echo $produk->nama_produk ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group form-group-lg">
<label>Status Produk</label>
<select name="status_produk" class="form-control">
	<option value="Publish">Publikasikan</option>
  <option value="Draft" <?php if($produk->status_produk=="Draft") { echo "selected"; } ?>>Simpan sebagai Draft</option>
</select>
</div>
</div>
<div class="col-lg-3">
  <div class="form-group form-group-lg">
  <label>Upload gambar</label>
  <input type="file" name="gambar" class="form-control">
  </div>
</div>

<div class="col-md-3">
<div class="form-group form-group-lg">
<label>Kategori Produk</label>
<select name="id_kategori" class="form-control">
	<?php foreach($kategori as $kategori) { ?>
  	<option value="<?php echo $kategori->id_kategori ?>"
      <?php if($produk->id_kategori == $kategori->id_kategori) { echo "selected"; } ?>
      >
  	<?php echo $kategori->nama_kategori ?></option>
  <?php } ?>
</select>
</div>
</div>

<div class="col-md-3">
  <div class="form-group form-group-lg">
  <label>Harga Produk</label>
  	<input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?php echo $produk->harga ?>">
  </div>
</div>

<div class="col-md-3">
  <div class="form-group form-group-lg">
  <label>Stock Produk</label>
    <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?php echo $produk->stok ?>">
  </div>
</div>

<div class="col-md-3">
  <div class="form-group form-group-lg">
  <label>Satuan Produk</label>
  <select name="satuan" class="form-control">
    <option value="Kg">Kg</option>
    <option value="Gram" <?php if($produk->status_produk=="Gram") { echo "selected"; } ?>>Gram</option>
    <option value="Kwintal" <?php if($produk->status_produk=="Kwintal") { echo "selected"; } ?>>Kwintal</option>
    <option value="Unit" <?php if($produk->status_produk=="Unit") { echo "selected"; } ?>>Unit</option>
    <option value="Ons" <?php if($produk->status_produk=="Ons") { echo "selected"; } ?>>Ons</option>
  </select>
  </div>
</div>

<div class="col-md-12">
  <div class="form-group form-group-lg">
  <label>Deskripsi</label>
  <textarea name="deskripsi" class="form-control" placeholder="deskripsi" id="keterangan"><?php echo $produk->deskripsi ?></textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
  <input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
  </div>
</div>


<?php echo form_close() ?>
