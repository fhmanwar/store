<p><a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>');
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Judul Galeri</th>
        <th>Posisi</th>
        <th>Website</th>
        <th>Tanggal</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php $i=1; foreach($galeri as $galeri) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $galeri->judul_galeri ?></td>
        <td><?php echo $galeri->posisi_galeri ?></td>
        <td><?php echo $galeri->website ?></td>
        <td><?php echo $galeri->tanggal_post ?></td>
        <td>
        <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>"class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
        <?php include('delete.php') ?>

        </td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>
