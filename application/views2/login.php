<?php
echo form_open('user/login');
?>

  <div class="container-fluid">
  	<div class="row-fluid">
	  	<div class="span6">
	  	<img class = 'img-rounded' src = <?php echo base_url('img/logo.png')?>></div>
	  	<div class="span6">
	  		<br><br><br>
	  		<div class="row-fluid">
		  		<div class="span6">UserID:</div>
		  	</div>
		  	<div class="row-fluid">
		  		<div class="span6"><input type = "text" name = "UserID" id = "UserID"></div>
		  	</div>
	  		<div class="row-fluid">
		  		<div class="span6">UserPassword:</div>
		  	</div>
		  	<div class="row-fluid">
		  		<div class="span6"><input type = "password" name = "UserPassword" id = "UserPassword"></div>
		  	</div>
	  		<br>
	  		<input class="btn" type = "submit" name = "submit" id = "submit" value="submit">
	  		<a class="btn btn-primary" href = "http://localhost/HuaweiAdmin/index.php/user/register">register</a>
	  	</div>
	</div>
  </div>
<?php 
echo form_close();
?>