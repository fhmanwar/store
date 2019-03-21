<div id="colorlib-contact" class="margin-top">
  <div class="container">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-wrap">
            <h3 class="text-center">Log In</h3>
            <div class="panel-body">
              <?php
  						// cetak error
  						if($this->session->flashdata('sukses')) {
  							echo '<div class="alert alert-success">';
  							echo $this->session->flashdata('sukses');
  							echo '</div>';
  						}

  						// Cetak validasi error
  						echo validation_errors('<div class="alert alert-success">','</div>');
  						?>
            <form method="post" action="<?php echo base_url('home/login') ?>">
              <div class="row form-group text-left ">
                <div class="col-lg-12 padding-bottom">
                  <label for="fname">Username</label>
                  <input type="text" id="fname" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="col-lg-12">
                  <label for="lname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password">
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
                <input type="submit" value="Login" class="btn btn-primary">
                <a href="<?php echo base_url('home/register') ?>" class="btn btn-primary">Register</a>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
