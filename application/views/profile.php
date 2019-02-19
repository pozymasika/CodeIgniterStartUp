     <?php 
    foreach ($data as $row) {
        $email = $row->Email;
        $username = $row->UserName;
        $name = $row->Name;
    }
    ?>
 <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid"></div>
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
 						<h4><?php echo $this->session->userdata('username'); ?></h4>
                   <p><?php echo $this->session->flashdata('success_msg'); ?></p>
                    <p><?php echo $this->session->flashdata('error_msg'); ?></p>
                    </div>
                </div>
            </nav>
            <div class="container">
<div class="card">
<article class="card-body mx-auto" style="max-width: 500px;">
	<h4 class="card-title mt-3 text-center">Update Account</h4>
    <?php echo form_open('Login/updateprof')?>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" value="<?php echo $name?>">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-industry"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="UserName" type="text" value="<?php echo $username?>">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $email ?>" disabled>
    </div> 
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Update Profile </button>
    </div>                                                                      
</form>
</article>
</div> 
        </div>