<div id="colorlib-contact" class="margin-top">
  <div class="container">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-wrap">
            <h3 class="text-center">Log In</h3>
            <?php
            // Session
            if($this->session->flashdata('success')) {
            	echo '<div class="alert alert-success">';
            	echo $this->session->flashdata('success');
            	echo '</div>';
            }

            // cetak error kalau ada salah input
            echo validation_errors('<div class="alert alert-warning">','</div>');
            ?>
            <form method="post" action="<?php echo base_url('home/register') ?>">
              <div class="row form-group text-left ">
                <div class="col-lg-6 padding-bottom">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-lg-6">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" class="form-control" placeholder="Last Name" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 padding-bottom">
                  <label for="username">Nama</label>
                  <input type="text" id="name" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col-lg-6">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email Address" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-lg-6 padding-bottom">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" required>
                </div>
                <div class="col-lg-6 ">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" required>
                  <input type="hidden" name="id_home" value="1" class="form-control" required>
                  <input type="hidden" name="akses_level" value="User" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
				        <label class="checkbox-inline">
			            <input type="checkbox" /> Remember me
				        </label>
				        <span class="pull-right">
               		<a href="#" >Forget password ? </a>
				        </span>
					    </div>
              <div class="form-group text-center">
                <input type="submit" value="Register" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
