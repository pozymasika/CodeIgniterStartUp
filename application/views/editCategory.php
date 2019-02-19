<?php 
foreach($data as $row){
    $name = $row->Name;
    $desc =  $row->Description;
    $id = $row->CatID;
}
?>
<div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    	<h4><?php echo $this->session->userdata('username'); ?></h4>

                    </div>
                </div>
            </nav>
<div class="signin-form">
<?php echo form_open('Login/editCategory');?>
    <div class="form-group"><label for="Name">Category Name:</label><input type="text" name="name" id="catName" class="form-control form-control-sm" value= "<?php echo $name;?>"></label></div>
    <div class="form-group">
    <label for="Category Description">Description:</label>
    <textarea name="desc" id="" cols="20" rows="5" class="form-control" >   
    <?php echo $desc; ?>
</textarea></div>

<input type="hidden" name="id" id="inputid" class="form-control" value="<?php echo $id;?>">

    <button type="submit" class="btn btn-sm btn-primary" name="cat">Submit</button>
</form>
        </div>
    </div>