<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open(base_url('admin/User/tambah'));
?>
<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>User For Site? </label>
		<select name="id_home" class="form-control">
			<?php //foreach ($home as $home) {?>
				<option value="<?php //echo $home->id_home ?>Visited"> <?php //echo $home->namaweb.' - '.$home->website ?> </option>
			<?php //} ?>
		</select>
	</div>
	<div class="form-group form-group-lg">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo set_value('email') ?>" required>
	</div>

</div>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo set_value('username') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Level Hak Akses </label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Administrator</option>
			<option value="User">User</option>
		  <option value="Blocked">Blocked</option>
		</select>
	</div>
</div>

<div class="col-lg-12">
	<div class="form-group form-group-lg">
		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php echo form_close() ?>
