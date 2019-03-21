<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open(base_url('admin/user/edit/'.$user->id));
?>
<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>User For Site? </label>
		<select name="id_home" class="form-control">
			<?php //foreach ($home as $home) {?>
				<option value="<?php //echo $home->id_home ?>" <?php //if($user->id_home==$home->id_home){ echo "selected"; } ?>>
					<?php //echo $home->namaweb.' - '.$home->website ?>
				</option>
			<?php //} ?>
		</select>
	</div>
	<div class="form-group form-group-lg">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>"required>
	</div>
	<div class="form-group form-group-lg">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $user->email ?>"required>
	</div>

</div>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $user->username ?>" readonly>
	</div>
	<div class="form-group form-group-lg">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="password" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Level Hak Akses </label>
		<select name="akses_level" class="form-control">
			<option value="Admin" <?php if($user->akses_level=="Administrator"){ echo "selected"; } ?> >Administrator</option>
			<option value="User" <?php if($user->akses_level=="User"){ echo "selected"; } ?>>User</option>
		  <option value="Blocked" <?php if($user->akses_level=="Blocked"){ echo "selected"; } ?> >Blocked</option>
		</select>
	</div>
</div>

<div class="col-lg-12">
	<div class="form-group form-group-lg">
		<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>
</div>

<?php echo form_close() ?>
