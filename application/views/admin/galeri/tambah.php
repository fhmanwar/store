<!-- TinyMCE -->
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
// Error
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/galeri/tambah'));
?>
<div class="col-md-8">
	<div class="form-group form-group-lg">
		<label>Judul Galeri</label>
		<input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri" value="<?php echo set_value('judul_galeri') ?>">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group form-group-lg">
		<label>Posisi Galeri</label>
		<select name="posisi_galeri" class="form-control">
			<option value="Galeri">Galeri</option>
		  <option value="Homepage">Homepage Slider</option>
		</select>
	</div>
</div>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Link/Url Galeri</label>
		<input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo set_value('website') ?>">
	</div>
</div>

<div class="col-lg-6">
  <div class="form-group form-group-lg">
  <label>Upload gambar</label>
  <input type="file" name="gambar" class="form-control">
  </div>
</div>

<div class="col-lg-12">
  <div class="form-group">
  <label>Isi Berita</label>
  <textarea name="isi_galeri" class="form-control" placeholder="Isi Galeri" id="keterangan"><?php echo set_value('isi_galeri') ?></textarea>
  </div>

  <div class="form-group">
  <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
  <input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
  </div>
</div>

<?php echo form_close() ?>
