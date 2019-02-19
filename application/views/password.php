<div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

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
                    </div>
                </div>
            </nav>
    <div class="container">
        <div class="card">
            <article class="card-body mx-auto" style="max-width: 500px;">
                <h4 class="card-title mt-3 text-center">Update Password</h4>
                <?php echo form_open('Login/updatePass');?>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="oldpassword" placeholder="Old password" type="password">
                        <span class="help-block"></span>
                    </div> 

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="newpassword" placeholder="New password" type="password">
                        <span class="help-block">   <span>
                    </div>   
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Update Profile </button>
                        </div> 
                </form>
            </article>
        </div>                 
    </div>