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
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>
<div class="col-md-8">
<div class="form-group form-group-lg">
<label>Nama berita</label>
<input type="text" name="judul" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul ?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group form-group-lg">
<label>Status Berita</label>
<select name="status_berita" class="form-control">
	<option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan sebagai Draft</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group form-group-lg">
<label>Kategori Berita</label>
<select name="id_kategori" class="form-control">
	<?php foreach($kategori as $kategori) { ?>
  	<option value="<?php echo $kategori->id_kategori ?>"
      <?php if($berita->id_kategori == $kategori->id_kategori) { echo "selected"; } ?>
      >
  	<?php echo $kategori->nama_kategori ?></option>
  <?php } ?>
</select>
</div>
</div>

<div class="col-md-4">
  <div class="form-group form-group-lg">
  <label>Jenis berita</label>
  <select name="jenis_berita" class="form-control">
  	<option value="Berita">Berita</option>
      <option value="Profil" <?php if($berita->jenis_berita=="Profil") { echo "selected"; } ?>>Profil</option>
  </select>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group form-group-lg">
  <label>Upload gambar</label>
  <input type="file" name="gambar" class="form-control">
  </div>
</div>

<div class="col-md-12">
  <div class="form-group form-group-lg">
  <label>Keterangan</label>
  <textarea name="isi" class="form-control" placeholder="Keterangan" id="keterangan"><?php echo $berita->isi ?></textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
  <input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
  </div>
</div>


<?php echo form_close() ?>
