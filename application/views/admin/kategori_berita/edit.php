<?php
// Validasi
echo validation_errors('<div class="alert alert-success">','</div>');

// Form
echo form_open(base_url('admin/kategori_berita/edit/'.$kategori_berita->id_kategori));
?>

<div class="col-lg-8">
  <div class="form-group form-group-lg">
    <label>Nama kategori</label>
    <input type="text" name="nama_kategori" placeholder="Nama kategori berita" value="<?php echo $kategori_berita->nama_kategori ?>" required class="form-control">
  </div>
</div>

<div class="col-lg-4">
  <div class="form-group form-group-lg">
    <label>Urutan tampil</label>
    <input type="number" name="urutan" placeholder="Urutan tampil" value="<?php echo $kategori_berita->urutan ?>" required class="form-control">
  </div>
</div>

<div class="col-lg-12">
  <div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $kategori_berita->keterangan ?></textarea>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
  </div>
</div>
<?php echo form_close() ?>
