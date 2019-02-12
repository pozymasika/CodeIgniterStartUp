<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<style>
body {
color: #fff;
background: #19aa8d;
font-family: 'Roboto', sans-serif;
}
</style>
</head>
<body>
<div class="signin-form">
    <form action="<?php echo site_url('Login/process'); ?>" method="post">
		<h2 style="text-align:center">                                                                                                                                                                                                                                                                                                                                                                                          Log In</h2>
		<p>Please fill in this form to Login</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="text" class="form-control" name="user" placeholder="Email Address" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="pass" placeholder="Password" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox"> Remember Me</label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Sign In</button>
        </div>
    </form>
	<div class="text-center">Don't have an account? <a href='<?php echo base_url()."index.php/Login/signup";?>'>Sign Up here</a></div>
</div>
</body>
</html>        