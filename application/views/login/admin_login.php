<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New System</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le styles -->
	<?php echo css('bootstrap-responsive.css'); ?>
	<?php echo css('bootstrap.css'); ?>
  </head>
  <body>
<div class="container">
<!-- Forms
================================================== -->
<section id="forms">
  <br/>
  <br/>
  <br/>
  <div class="page-header">
  <br/>
  <br/>
  <br/>
  <br/>
  <h1 style="margin-left:320px;">New System Login</h1>
  </div>
  <div class="row">
    <div class="span16">
      <?php echo form_open('login/validate_admin_credentials'); ?>
        <fieldset id="login-form" style="margin-left:350px;width:540px;">
		  <?php
		  if($this->session->flashdata('error'))
		  {
				echo "<div class='alert alert-error'><a class='close' href='#'>&times;</a><p>" . $this->session->flashdata('error') . "</p></div>";
		  }
		  ?>
		  <div class="clearfix">
            <label for="xlInput">Username</label>
            <div class="input">
              <input class="xlarge disabled" id="xlInput" name="username" size="30" type="text" placeholder="username is admin" />
            </div>
          </div><!-- /clearfix -->
		  <div class="clearfix">
            <label for="xlInput">Password</label>
            <div class="input">
            <input class="xlarge disabled" id="xlInput" name="password" size="30" type="password"  placeholder="password is admin" />
            </div>
          </div><!-- /clearfix -->
		  <br/>
          <div class="actions">
            <input type="submit" class="btn btn-primary btn-large" value="Login">
          </div>
        </fieldset>
      <?php echo form_close(); ?>
    </div>
  </div><!-- /row -->

  <br />

</section>

    </div><!-- /container -->

    <footer class="footer">
      <div class="container">
       <p class="pull-right">&copy; New System 2012.</p>
      </div>
    </footer>

  </body>
</html>
<?php
echo js('jquery-min.js');


?>
<script type="text/javascript">
$(document).ready(function(){
	$(".alert-message").alert();
});
</script>
