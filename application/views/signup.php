<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<style>
body {
color: #fff;
background: #19aa8d;
font-family: 'Roboto', sans-serif;
}
.card{
color:black;
background-color:#882525;
}
</style>
<body>
<div class="container">
<div class="card">
<article class="card-body mx-auto" style="max-width: 500px;">
    <h4 class="card-title mt-3 text-center">Create Account</h4>
	<form action="<?php echo site_url('Login/sprocess'); ?>" method="post">
	<?php validation_errors();?>
	<?php echo $this->session->flashdata("error_msg");?>
	<?php echo form_open('login'); ?>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" required>
	</div> 
		<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="User Name" type="text" required>
	</div> 	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-industry"></i> </span>
		 </div>
        <input name="orgName" class="form-control" placeholder="Organization Name" type="text" required>
      
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" required>
        
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
		 </div>
        <input name="location" class="form-control" placeholder="Location" type="text" required>
       
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="country" class="custom-select" style="max-width: 120px;" required>
		    <option selected=""></option>
		    <option value="+255">TZ: +255</option>
		    <option value="+256">UG: +198</option>
		    <option value="+254">KE: +254</option>
		</select>
        <input name="orgPhone" class="form-control" placeholder="Phone number" type="text" required>
        
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select name="type" class="form-control" required>
			<option selected=""> Select Account Type</option>
			<option>Church</option>
			<option>NGO</option>
            <option>University</option>
            <option>Company</option>
            <option>School</option>
		</select>
	</div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create password" type="password" required>
        
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="confirm_password" placeholder="Repeat password" type="password" required>
       
    </div>             
    <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
	</div>                   
    <div class="form-group">
		<input type="submit" value="Submit"  class="btn btn-primary btn-block">
	</div>      
    <p class="text-center">Have an account? <a href='<?php echo base_url()."index.php/Login/index";?>'>Log In</a> </p>                                                                 
</form>
</article>
</div> 

</div> 
</body>
</html>