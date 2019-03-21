<p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
  //cetak notifikasi
  if($this->session->flashdata('success')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('success');
    echo '</div>';
  }
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama / Site</th>
        <th>Email</th>
        <th>Username</th>
        <th>Level</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php $i=1; foreach($user as $users) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $users->nama ?><br><small>Site : <!--<?php echo $users->namaweb ?>--></small></td>
        <td><?php echo $users->email ?></td>
        <td><?php echo $users->username ?></td>
        <td><?php echo $users->akses_level ?></td>
        <td>
        <a href="<?php echo base_url('admin/user/edit/'.$users->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
        <?php
          //Delete
          include('delete.php')
        ?>
        </td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>
