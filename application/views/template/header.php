<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacts</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style5.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/crud.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<style>
a{
    text-decoration: none;
}
</style>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
			<h3>talkTalk</h3>
            </div>
            <ul class="list-unstyled components">
				<li>
                    <a href="<?php echo base_url().'index.php/Login/welcome';?>"><span><i class="fas fa-tachometer-alt"></i></span> Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url().'index.php/Login/message';?>"><span><i class="fas fa-envelope"></i></span> Messages</a>
                </li>
                <li>
                    <a href="<?php echo base_url().'index.php/Login/category';?>"><span><i class="fas fa-filter"></i></span> Category</a>
                </li>
                <li>
                    <a href="<?php echo base_url().'index.php/Login/contacts';?>"><span><i class="fas fa-phone"></i></span> Contacts</a>
				</li>
				<li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span><i class="fas fa-envelope"></i></span> Settings</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url().'index.php/Login/profile';?>">Update Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'index.php/Login/password';?>">Update Password</a>
                        </li>
                        <li>
                            <a href="#">User Settings</a>
                        </li>
                    </ul>
				</li>
				<li>
                    <a href="<?php echo base_url() . 'index.php/Login/logout'; ?>"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                </li>
            </ul>
        </nav>
       